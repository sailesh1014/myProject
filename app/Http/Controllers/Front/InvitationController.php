<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;

class InvitationController extends Controller
{
     public function invitationAction($event_id, $user_id, $action) : RedirectResponse
     {
          abort_if(auth()->user()->id != $user_id, 401);
          $event = Event::findOrFail($event_id);
          $event->invitations()->updateExistingPivot($user_id, ['status' => $action]);
          return redirect()->route('front.home')->with(['toast.success' =>  'Invitation for the '.ucwords($event->title)." ".ucwords($action)]);
     }
}
