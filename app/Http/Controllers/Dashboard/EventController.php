<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\InvitationStatus;
use App\Constants\InvitationType;
use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Mail\ArtistInvitationMail;
use App\Models\Event;
use App\Models\User;
use App\Notifications\ArtistInvitation;
use App\Services\ClubService;
use App\Services\EventService;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class EventController extends Controller {

    public function __construct(protected EventService $eventService, protected RoleService $roleService, protected ClubService $clubService) {}

    public function index(Request $request)
    {
        $this->authorize('view', Event::Class);
        if (! $request->ajax())
        {
            return view('dashboard.events.index');
        }
        $input = $request->only(['length', 'start', 'order', 'search']);

        $resp = $this->eventService->paginateWithQuery($input);

        return response()->json([
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($resp['meta']['recordsTotal']),
            "recordsFiltered" => intval($resp['meta']['recordsFiltered']),
            "data"            => $resp['data'],
        ], 200);
    }

    public function create(): View
    {
        $event = new Event();
        $clubs = $this->clubService->getclubs()->pluck('name', 'id');

        return view('dashboard.events.create', compact('event', 'clubs'));
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $this->authorize('create', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'media', 'fee', 'club_id', 'preference');
        $inputCollection = collect($input);
        $this->eventService->organizeEvent($inputCollection);

        return redirect()->route('events.index');
    }

    public function show(Event $event): View
    {
        $this->authorize('view', Event::class);
        if(auth()->user()->isOrganizer()){
            $authorized = $event->club_id == auth()->user()->club->id;
            abort_if(!$authorized, "401");
        }
        $event->load('club', 'invitations');
        $roleId = $this->roleService->getRoleByKey(UserRole::ARTIST)->id;

        $favourableArtists = User::where('role_id', $roleId)->where(function ($q) use ($event) {
            if ($event->preference !== PreferenceType::ANY)
            {
                $q->whereIn('preference', [PreferenceType::ANY, $event->preference]);
            }
        })->get();

        $alreadyInvitedArtists = $event->invitations;

        return view('dashboard.events.show', compact('event', 'favourableArtists', 'alreadyInvitedArtists'));
    }

    public function edit(Event $event): View
    {
        $event->load('eventMedia');
        $clubs = $this->clubService->getclubs()->pluck('name', 'id');

        return view('dashboard.events.edit', compact('event', 'clubs'));
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $this->authorize('update', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'media', 'fee', 'club_id', 'preference');
        $inputCollection = collect($input);
        $this->eventService->updateEvent($inputCollection, $event);

        return redirect()->route('events.show', $event->id);
    }

    public function destroy(Event $event): JsonResponse
    {
        $this->authorize('update', Event::class);
        $this->eventService->deleteEvent($event);

        return response()->json(['message' => 'Event successfully deleted']);
    }

    public function inviteArtist(Event $event, Request $request): JsonResponse
    {

        $request->validate([
            'artist' => ['required', 'array', 'min:1'],
        ], ['artist.required' => 'At least one artist should be selected.']);
        
        $event->load('invitations');
        $artists = $request->input('artist');
        $alreadyInvitedArtistForEvent = $event->invitations->pluck('id')->toArray();

        $toInviteArtist = array_diff($artists, $alreadyInvitedArtistForEvent);
        $data = [];
        foreach ($toInviteArtist as $k => $artist)
        {
            $data[$artist] = ['status' => InvitationStatus::PENDING, 'type' => InvitationType::INVITED];
        }
        $event->invitations()->attach($data);
        // TODO:: Queue mail.
         $users = User::whereIn('id', $toInviteArtist)->get();
         foreach ($users as $user) {
              $event->accept_url = URL::temporarySignedRoute('invitation.artist.action', now()->addDays(3), ['event_id' => $event->id, 'user_id' => $user->id, 'action' => 'accepted']);
              $event->reject_url = URL::temporarySignedRoute('invitation.artist.action', now()->addDays(3), ['event_id' => $event->id, 'user_id' => $user->id, 'action' => 'rejected']);
              Mail::to($user)->send(new ArtistInvitationMail($event,$user));
              Notification::send($user, new ArtistInvitation($event));
         }
        return response()->json(['message' => 'Invitation sent successfully']);
    }
}
