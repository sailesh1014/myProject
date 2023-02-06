<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(protected EventService $eventService){}
    public function index()
    {

    }

    public function create(): View
    {
        $event = new Event();
        return view('dashboard.events.create', compact('event'));
    }

    public function edit(Event $event): View
    {
        $event->load('eventImages');
        return view('dashboard.events.edit', compact('event'));
    }

    public function store(EventRequest $request){
        $this->authorize('create', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'images', 'fee');
        $inputCollection = collect($input);
        $this->eventService->organizeEvent($inputCollection);
        return response()->json(['message' => 'Event Successfully Created'], 200);
    }


    public function update(EventRequest $request, Event $event): View
    {
      //  $this->authorize('update', Event::class);
        dd($request->all());
        return view('dashboard.events.event', compact('event'));
    }
}
