<?php
declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Constants\EventStatus;

use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Services\ClubService;
use App\Services\EventService;
use App\Services\RoleService;



use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Rating;
use App\Models\User;




use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller {
    public function __construct(protected EventService $eventService, protected RoleService $roleService, protected ClubService $clubService) {}


    public function index(): RedirectResponse|View
    {
        if(Auth::check()){
            return  redirect(get_user_home_page());
        }
        return view('front.welcome.index');
    }

    public function home(): View
    {
        $eventIdArr = $this->eventService->getEventByKey(EventStatus::PUBLISHED)
            ->pluck('id');
        $events = Event::whereIn('id', $eventIdArr)
            ->where('event_date', '>', \Carbon\Carbon::now()->toDateString())
            ->take(3)
            ->get();


         $currentUserId = auth()->id();
         $currentDateTime = Carbon::now();
         $data['recommended_events'] = Event::join('clubs', 'events.club_id', '=', 'clubs.id')
              ->join('genre_user', 'clubs.user_id', '=', 'genre_user.user_id')
              ->join('genre_user AS gu', 'gu.genre_id', '=', 'genre_user.genre_id')
              ->where('gu.user_id', $currentUserId)
              ->where('events.status', EventStatus::PUBLISHED)
              ->where('events.event_date', '>',$currentDateTime)
              ->select('events.*')
              ->distinct()->limit(6)
              ->orderBy('title')
              ->get();

         // will be empty if user has no selected genres.
         if($data['recommended_events']->isEmpty()){
              $data['recommended_events'] = Event::published()->inRandomOrder()
                   ->where('events.event_date', '>',$currentDateTime)
                   ->take(6)
                   ->orderBy('title')
                   ->get();
         }

         $currentUserGenres = \auth()->user()->genres->pluck('id')->toArray();
         $artistRoleId = $this->roleService->getRoleByKey(UserRole::ARTIST)->id;
         $data['recommended_artists'] = User::join('genre_user as gu', 'users.id', '=', 'gu.user_id')
              ->join('genres', 'genres.id', 'gu.genre_id')
              ->whereIn('gu.genre_id', $currentUserGenres)
              ->where('users.role_id', $artistRoleId)
              ->select('users.*')
              ->distinct()->limit(6)
              ->orderBy('first_name')
              ->get();


         // will be empty if user has no selected genres.
         if($data['recommended_artists']->isEmpty()){
              $data['recommended_artists'] = User::where('users.role_id', $artistRoleId)->inRandomOrder()
                   ->take(6)
                   ->orderBy('first_name')
                   ->get();
         }


         $data['upcoming_events'] =  Event::published()
              ->where('event_date', '>', now())
              ->orderBy('event_date')
              ->limit(3)
              ->get();
         return view('front.home.index',compact('events'))->with($data);
    }


    public function emailVerified(): view
    {
        return view('auth.email-verified');
    }

    public function artistDetail($id): View
    {
         try
         {
              $id = Crypt::decrypt($id);
         }catch(\Exception $e){
               abort(404);
         }
         $artist = User::where('id', $id)->where('role_id', $this->roleService->getRoleByKey(UserRole::ARTIST)->id)->firstOrFail();
//        $eventIdArr = $this->eventService->getEventByKey(EventStatus::LIST)->pluck('id');
//        $events = Event::whereIn('id', $eventIdArr)->get();


//        $alreadyInvitedArtists = $event->invitations;
//        $artist = 2;

         $authUserEvents = \auth()->user()->club?->events->where('event_date', '>', now())->where('status', EventStatus::PUBLISHED);
         $userHasUpComingEvents = false;

        return view('front.artist.index', compact('artist', 'authUserEvents'));
    }

    public function artist(RoleService $roleService): view
    {
         $artistRole = $roleService->getRoleByKey(UserRole::ARTIST);
         $artist = User::with('genres')->where('role_id', $artistRole->id)->first();
        return view('front.artist.index', compact('artist'));

    }

}
