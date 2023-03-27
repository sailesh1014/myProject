<?php

namespace App\Http\Controllers\Front;

use App\Constants\InvitationStatus;
use App\Constants\InvitationType;
use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Artist;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArtistController extends Controller
{
    public function inviteArtist( Request $request, $artist): JsonResponse
    {

        $artist = User::findorFail($artist);
        $data = [];
        $events = $request->input('event');
        foreach ($events as $k => $event)
        {
            $data[$event] = ['status' => InvitationStatus::PENDING, 'type' => InvitationType::INVITED];
            try {
                $user = User::where('id',$artist->id)->first();
                $event = Event::where('id',$event[$k])->first();
                $recipientEmail = $user->email;
//                dd($recipientEmail);
                if (filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($recipientEmail)->send(new TestMail($event,$user));
                }
            } catch (\Exception $e) {
            }
        }
        $artist->invitations()->attach($data);

        return response()->json(['message' => 'Invitation sent successfully']);
    }
}
