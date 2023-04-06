<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClubController extends Controller
{
    //

    public function clubDetail($id): view
    {
        $id = 3;
   $club = Club::where('id',$id)->first();
//   dd($club);
//        try
//        {
//            $id = Crypt::decrypt($id);
//        }catch(\Exception $e){
//            abort(404);
//        }
//        $club = Club::where('id',$id)->findOrFail();
//        $authUserEvent = Event::published()->where('club_id', auth()->user()->club?->id)->where('event_date', '>', now())->orderBy('event_date', 'desc')->first() ?? null;
        $authUserEvent = Event::published()->where('club_id',$id)->where('event_date', '>', now())->orderBy('event_date', 'desc')->first() ?? null;
//dd($authUserEvent);
        return view('front.club.index',compact('club','authUserEvent'));
    }
}
