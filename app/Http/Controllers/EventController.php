<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view("user.index", compact("events"));
    }



    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view("user.details", compact("event"));
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("");
    }


    public function store(StoreEventRequest $event , Request $request)
    {
        Event::create($request->validated());

        return redirect()->route("");
    }


    public function update(UpdateEventRequest $event , Request $request)
    {
        $event->update($request->validated());
        return redirect()->route("");
    }





}
