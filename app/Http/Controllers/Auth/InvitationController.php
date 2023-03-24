<?php

namespace App\Http\Controllers\Auth;

use App\Constants\InvitationStatus;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function accept($event_id, $user_id)
    {

        $event = Event::findOrFail($event_id);
        $event->invitations()->updateExistingPivot($user_id, ['status' => 'accepted']);

        // Redirect the user to a success page

        return redirect()->route('front.home')->with('toast.success', 'Invitation Accepted Successfully ');

    }
}
