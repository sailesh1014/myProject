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

}
