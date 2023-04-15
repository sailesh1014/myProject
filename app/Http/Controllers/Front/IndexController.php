<?php
declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Constants\EventStatus;

use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Models\Club;
use App\Services\ClubService;
use App\Services\EventService;
use App\Services\RoleService;



use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Rating;
use App\Models\User;


use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller {
    public function __construct(protected EventService $eventService, protected RoleService $roleService, protected ClubService $clubService, protected UserService $userService) {}


    public function index(): RedirectResponse|View
    {
        if(Auth::check()){
            return  redirect(get_user_home_page());
        }
         $data['top_rated_artists'] = Rating::select('users.id','first_name', 'last_name','intro_video', 'email', 'user_name','preference',DB::raw('AVG(value) as average_rating'))
              ->join('users', 'users.id', 'ratings.to')
              ->groupBy('users.id','first_name', 'last_name','intro_video', 'email', 'user_name','preference')
              ->orderBy('average_rating')->limit(4)->get();
        return view('front.welcome.index')->with($data);
    }

    public function home(): View
    {

//        $eventIdArr = $this->eventService->getEventByKey(EventStatus::PUBLISHED)
//            ->pluck('id');
//        $events = Event::whereIn('id', $eventIdArr)
//            ->where('event_date', '>', \Carbon\Carbon::now()->toDateString())
//            ->take(3)
//            ->get();
//
//        $clubId = Club::pluck('id')
//            ->take(3);
//        $clubs = $clubId->toArray();


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
              $data['recommended_artists'] = User::artist()->inRandomOrder()
                   ->take(6)
                   ->orderBy('first_name')
                   ->get();
         }

        $upcomingClubs = Club::whereHas('events', function ($query) {
            $query->where('event_date', '>', now());
        })
            ->inRandomOrder()
            ->limit(3)
            ->get();


         $data['recommended_clubs'] = $upcomingClubs;
         $data['upcoming_events'] =  Event::published()
              ->where('event_date', '>', now())
              ->orderBy('event_date')
              ->limit(3)
              ->get();

         return view('front.home.index')->with($data);
//         return view('front.home.index',compact('events',))->with($data);

    }

     public function markNotifications(Request $request): \Illuminate\Http\Response
     {
          \auth()->user()
               ->unreadNotifications
               ->when($request->input('id'), function ($query) use ($request){
                    return $query->where('id', $request->input('id'));
               })
               ->markAsRead();
          return response()->noContent();
     }

    public function emailVerified(): view
    {
        return view('auth.email-verified');
    }
    public function contact(): View
    {
        return view('front.contact.contact');
    }

     public function rateUser(Request $request) : JsonResponse
     {
          if(!$request->ajax()){
               abort(404);
          }
          $request->validate(['rating' => ['required','in:1,2,3,4,5'], 'user_id' =>['required', 'string']]);
          $user_id = $request->input('user_id');
          try
          {
               $user_id = Crypt::decrypt($user_id);
          }catch(\Exception $e){
               throw new Exception('Invalid Argument');
          }
          $artist = User::findOrFail($user_id);
          $rating = $request->input('rating');
          $this->userService->rateUser($artist,$rating);
          return response()->json(['message' => "Artist rated successfully"]);
     }

}
