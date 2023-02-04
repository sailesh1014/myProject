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

    public function store(EventRequest $request){
        $this->authorize('create', Event::class);
        dd($request->all());
    }
}
