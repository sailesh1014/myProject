<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Notifications\InvitationAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class InvitationController extends Controller
{
     public function invitationAction($event_id, $user_id, $action, Request $request) : Response|RedirectResponse
     {
          $event = Event::findOrFail($event_id);
          $event->invitations()->updateExistingPivot($user_id, ['status' => $action]);

          $notificationUser = $event->club->user;
          if(auth()->user()->isArtist()){
               $message = "Invitation $action by ". auth()->user()->user_name. " for event ". ucwords($event->title);
          }else{
               $message = "Invitation $action for ". ucwords($event->title). " organized by ". ucwords($event->club->name);
               $notificationUser = $user_id;
          }
          Notification::send($notificationUser, new InvitationAction($message));
          if($request->ajax()){
               return response()->noContent();
          }
          return redirect()->route('front.home')->with(['toast.success' =>  'Invitation for the '.ucwords($event->title)." ".ucwords($action)]);
     }
}
