<?php

namespace App\Http\Controllers\Front;


use App\Constants\InvitationStatus;
use App\Constants\InvitationType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ArtistRequest;
use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\InvitationRequest;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class ArtistController extends Controller
{
     public function __construct(protected UserService $userService){

     }
     public function artistDetail($id): View
     {
          try
          {
               $id = Crypt::decrypt($id);
          }catch(\Exception $e){
               abort(404);
          }

          $artist = User::artist()->where('id', $id)->firstOrFail();
           //organizer latest event
          $authUserEvent = Event::published()->where('club_id', auth()->user()->club?->id)->where('event_date', '>', now())->orderBy('event_date', 'desc')->first() ?? null;
          $isAlreadyInvited = DB::table('invitation_user')->where('user_id', $artist->id)->where('event_id', $authUserEvent?->id)->first();
          $hasMadePayment = $authUserEvent ? Payment::where('user_id', $artist->id)->where('event_id', $authUserEvent->id)->first() : null;

          $rating = ceil($artist->ratings->avg('value'));
          return view('front.artist.index', compact('artist', 'authUserEvent', 'isAlreadyInvited', 'hasMadePayment', 'rating'));
     }

     public function editArtist($id, ArtistRequest $request) : JsonResponse
     {
            $artist_id = Crypt::decrypt($id);
            $artist = User::findOrFail($artist_id);
            $data = $request->only('first_name', 'last_name', 'address', 'user_name', 'phone', 'role', 'thumbnail', 'intro_video', 'charge_amount');
            $data['role'] = auth()->user()->role->key;
            $this->userService->updateUser($data,$artist);
            return response()->json(['message' => "Artist updated successfully"]);
     }


     public function searchArtist(Request $request){
          $query = $request->input('name');
          if(!$query){
               return redirect()->back()->with(['toast.error' => 'Artist name cannot be empty']);
          }
          $artists = User::artist()->where('user_name', 'like', "%$query%")
               ->orWhere('first_name', 'like', "%$query%")
               ->orWhere('last_name', 'like', "%$query%")
               ->get();

          return view('front.artist.search',  compact('artists' ,'query'));
     }

     public function applyEvent($id, Request $request){
        abort_if(!auth()->user()->isArtist(),401);
          $event = Event::findOrFail($id);
          $artist = auth()->user();
          $isAlreadyInvited =  auth()->user()->invitations->where('id', $event->id)->first();
          if($isAlreadyInvited){
               $data = \Illuminate\Support\Facades\DB::table('invitation_user')->where('user_id', auth()->user()->id)
                    ->where('event_id', $event->id)->first();
               return response()->json(['message' => "Already Applied. Status $data->stauts"],422);
          }
          $data[$id] = ['status' => InvitationStatus::PENDING, 'type' => InvitationType::REQUESTED];
          $artist->invitations()->attach($data);
          $event->accept_url =  URL::signedRoute('invitation.artist.action', ['event_id' => $event->id, 'user_id' =>$artist->id, 'action' => 'accepted']);
          $event->reject_url = URL::signedRoute('invitation.artist.action',['event_id' => $event->id, 'user_id' => $artist->id, 'action' => 'rejected']);
          Notification::send($event->club->user, new InvitationRequest($artist,$event));

          return response()->json(['message' => 'Request Successfully']);
     }
}
