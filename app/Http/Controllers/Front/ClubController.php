<?php
declare( strict_types = 1 );

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\OrganizerRequest;
use App\Models\Club;
use App\Models\Event;
use App\Services\ClubService;
use App\Models\User;

use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{

     public function __construct(protected ClubService $clubService, protected UserService $userService){}

     public function clubDetail($id) : view
     {
          try
          {
               $id = Crypt::decrypt($id);
          }
          catch( \Exception $e )
          {
               abort(404);
          }
          $club = Club::where('id', $id)->first();

          $rating = ceil($club->user->ratings->avg('value') ?? 0);
          $clubEvents = $club->events->where('events.events.date', '>', now());
          return view('front.club.index', compact('club', 'rating', 'clubEvents'));
     }

     public function editClub($id, OrganizerRequest $request) : JsonResponse
     {
          $club_id = Crypt::decrypt($id);
          $club = Club::findOrFail($club_id);
          $organizer = $club->user;

          $organizerData = $request->only('club_name', 'club_address', 'description', 'first_name', 'last_name', 'phone', 'intro_video', 'thumbnail');
          $organizerData['role'] = auth()->user()->role->key;

          $this->userService->updateUser($organizerData, $organizer);

          return response()->json(['message' => "Club updated successfully"]);
     }

}
