<?php

namespace App\Http\Controllers\organizer\event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerEventController extends Controller
{

    public function index()
    {
        $organizerId = auth()->id();
        $events = Event::where("is_approved", false)
            ->where("organizer_id", $organizerId)
            ->get();
        return view("organizer.dashboard.events.index", compact("events"));
    }



    public function create()
    {

        $organizerId = auth()->id();
        $events = Event::where("is_approved", false)
            ->where("organizer_id", $organizerId)
            ->get();
        return view("organizer.dashboard.events.index", compact("events"));
    }



    public function store(Request $request)
    {

        $eventData = $request->all();
        $eventData['organizer_id'] = $request->input('organizer_id');

        $event = Event::create($eventData);

        if ($request->hasFile("event_image")) {
            $event->addMediaFromRequest("event_image")->toMediaCollection('eventImage', 'media');
        }

        return redirect()->back()->with('status', 'Event created successfully!');
    }





}
