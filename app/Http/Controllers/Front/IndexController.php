<?php
declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Constants\EventStatus;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller {

    public function index(): RedirectResponse|View
    {
        if(Auth::check()){
            return  redirect(get_user_home_page());
        }
        return view('front.index');
    }

    public function home(): View
    {

         $currentUserId = auth()->id();
         $data['recommended_events'] =Event::join('clubs', 'events.club_id', '=', 'clubs.id')
              ->join('genre_user', 'clubs.user_id', '=', 'genre_user.user_id')
              ->join('genre_user AS gu', 'gu.genre_id', '=', 'genre_user.genre_id')
              ->where('gu.user_id', $currentUserId)
              ->where('events.status', EventStatus::PUBLISHED)
              ->select('events.*')
              ->distinct()->limit(12)
              ->get();
         $data['top_rated_artist'] = Rating::select('users.id','first_name', 'last_name','intro_video', 'email', 'user_name','preference',DB::raw('AVG(value) as average_rating'))
              ->join('users', 'users.id', 'ratings.to')
              ->groupBy('users.id','first_name', 'last_name','intro_video', 'email', 'user_name','preference')
              ->orderBy('average_rating')->first();
         return view('front.home.index')->with($data);
    }


    public function emailVerified(): view
    {
        return view('auth.email-verified');
    }

}
