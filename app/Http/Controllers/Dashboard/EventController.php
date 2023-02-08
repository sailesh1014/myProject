<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller {

    public function __construct(protected EventService $eventService) {}

    public function index(Request $request) {
        $this->authorize('view', Event::Class);
        if (!$request->ajax())
        {
            return view('dashboard.events.index');
        }
        $input = $request->only(['length', 'start', 'order', 'search']);

        $resp = $this->eventService->paginateWithQuery($input);

        return response()->json([
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($resp['meta']['recordsTotal']),
            "recordsFiltered" => intval($resp['meta']['recordsFiltered']),
            "data"            => $resp['data'],
        ], 200);
    }

    public function create(): View
    {
        $event = new Event();

        return view('dashboard.events.create', compact('event'));
    }

    public function store(EventRequest $request)
    {
        $this->authorize('create', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'images', 'fee');
        $inputCollection = collect($input);
        $this->eventService->organizeEvent($inputCollection);

        return redirect()->route('dashboard.index');
    }

    public function show(Event $event){
        $this->authorize('view', Event::class);

        return view('dashboard.events.show',compact('event'));
    }

    public function edit(Event $event): View
    {
        $images = $event->eventImages;
        $eventImages = [];
        foreach ($images as $file)
        {
            $imageName = $file->image;
            $obj['name'] = $imageName;
            $obj['size'] = filesize(public_path('storage/uploads/' . $imageName));
            $obj['path'] = asset('storage/uploads/' . $imageName);
            $eventImages[] = $obj;
        }

        return view('dashboard.events.edit', compact('event', 'eventImages'));
    }

    public function update(EventRequest $request, Event $event): View
    {
        $this->authorize('update', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'images', 'fee');
        $inputCollection = collect($input);
        $this->eventService->updateEvent($inputCollection,$event);


        return view('dashboard.events.event', compact('event'));
    }
}
