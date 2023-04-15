<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Requests\Front\OrganizerRequest;
use App\Models\Club;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): view
    {
        try
        {
            $id = Crypt::decrypt($id);
        }catch(\Exception $e){
            abort(404);
        }
        $event = Event::findOrFail($id);

        return view ('front.event.index',compact('event'));
    }
    public function editEvent($id, EventRequest $request) : JsonResponse
    {
        $event_id = Crypt::decrypt($id);
        $event = Event::findOrFail($event_id);


        // Store the new image file
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $directory = 'uploads/events';
            $filename = $thumbnail->getClientOriginalName();
            $imagePath = Storage::disk('public')->putFileAs($directory, $thumbnail, $filename);

            $event->thumbnail = basename($imagePath);
        }

        // Update the club data
        $event->title = $request->input('title');
        $event->excerpt = $request->input('excerpt');
        $event->description = $request->input('description');
        $event->fee = $request->input('fee');

        // Save the updated club data
        $event->save();

        return response()->json(['message' => "Event updated successfully"]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
