<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller {

    public function __construct(protected EventService $eventService) {}

    public function index() {}

    public function create(): View
    {
        $event = new Event();

        return view('dashboard.events.create', compact('event'));
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

    public function store(EventRequest $request)
    {
        $this->authorize('create', Event::class);
        $input = $request->only('title', 'excerpt', 'description', 'thumbnail', 'status', 'event_date', 'location', 'images', 'fee');
        $inputCollection = collect($input);
        $this->eventService->organizeEvent($inputCollection);

        return redirect()->route('dashboard.index');
    }


    public function update(EventRequest $request, Event $event): View
    {
      //  $this->authorize('update', Event::class);
        dd($request->all());

        return view('dashboard.events.event', compact('event'));
    }
}
