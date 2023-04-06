<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ClubRequest;
use App\Models\Club;
use App\Models\Event;
use App\Services\ClubService;
use App\Models\User;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClubController extends Controller
{
    //
    public function __construct(protected ClubService $clubService){

    }
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

    public function editclub($id, ClubRequest $request) : JsonResponse
    {
//        dd($request->all());
        $club_id = Crypt::decrypt($id);
//        dd($club_id);
        $club = Club::findOrFail($club_id);
        $data = $request->only('name',  'address', 'description', 'established_date');
//        dd($this->clubService->updateOrCreate($data,$club));
        Club::where('id', $club_id)->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'established_date' => $request->input('established_date'),

        ]);

        return response()->json(['message' => "Club updated successfully"]);
    }
}
