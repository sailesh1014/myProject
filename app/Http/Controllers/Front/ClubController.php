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
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    //
    public function __construct(protected ClubService $clubService){

    }
    public function clubDetail($id): view
    {
//dd($id);
        try
        {
            $id = Crypt::decrypt($id);
        }catch(\Exception $e){
            abort(404);
        }
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
        $club_id = Crypt::decrypt($id);
        $club = Club::findOrFail($club_id);



        // Store the new image file
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $directory = 'uploads/clubs';
            $filename = $thumbnail->getClientOriginalName();
            $imagePath = Storage::disk('public')->putFileAs($directory, $thumbnail, $filename);

            $club->thumbnail = basename($imagePath);
        }

        // Update the club data
        $club->name = $request->input('name');
        $club->address = $request->input('address');
        $club->description = $request->input('description');
        $club->established_date = $request->input('established_date');

        // Save the updated club data
        $club->save();

        return response()->json(['message' => "Club updated successfully"]);
    }

}
