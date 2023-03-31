<?php

namespace App\Http\Controllers\Front;

use App\Constants\EventStatus;
use App\Constants\InvitationStatus;
use App\Constants\InvitationType;
use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Artist;
use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ArtistController extends Controller
{
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
          return view('front.artist.index', compact('artist', 'authUserEvent', 'isAlreadyInvited', 'hasMadePayment'));
     }
}
