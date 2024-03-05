<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerEventController extends Controller
{

    public function index()
    {

        return view("organizer.event.create");
    }


    public function create()
    {

        $organizerId = auth()->id();
        $events = Event::where("is_approved", false)
            ->where("organizer_id", $organizerId)
            ->get();
        return view("organizer.event.create", compact("events"));
    }



    public function store(Request $request)
    {
        $event =  Event::create($request->all());

        if ($request->hasFile("event_image")) {
            $event->addMediaFromRequest("event_image")->toMediaCollection('eventImage', 'media');
        }

        $userid = $request->input("organizer_id");
        $event->users()->attach($userid);
        return redirect()->back();
    }





}
