<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Club;
use App\Models\Event;
use App\Models\User;
use App\Services\ClubService;
use App\Services\EventService;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller {

    public function __construct(protected EventService $eventService, protected RoleService $roleService, protected ClubService $clubService) {}

    public function index(Request $request) {
        $this->authorize('view', Event::Class);
        if (!$request->ajax())
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

    public function store(EventRequest $request)
    {
        $this->authorize('create', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'images', 'fee', 'club_id', 'preference');
        $inputCollection = collect($input);
        $this->eventService->organizeEvent($inputCollection);

        return redirect()->route('events.index');
    }

    public function show(Event $event){
        $this->authorize('view', Event::class);
        $event->load('club');
        return view('dashboard.events.show',compact('event'));
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
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'images', 'fee', 'club_id', 'preference');
        $inputCollection = collect($input);
        $this->eventService->updateEvent($inputCollection,$event);

        return redirect()->route('events.show', $event->id);
    }

    public function destroy(Event $event)
    {
        $this->authorize('update', Event::class);
        $this->eventService->deleteEvent($event);
        return response()->json(['message' => 'Event successfully deleted']);

    }
}
