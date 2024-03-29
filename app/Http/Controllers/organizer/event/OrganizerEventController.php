<?php

namespace App\Http\Controllers\organizer\event;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

class OrganizerEventController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $organizerId = auth()->id();
        $userId = Auth::id();
        $organizer = Organizer::where('user_id', $userId)->first();
        $events = Event::where("is_approved", false)
            ->where("organizer_id", $organizer->id)
            ->get();
        return view("organizer.dashboard.events.index", compact("events", "categories"));
    }



    public function create()
    {
        $organizerId = auth()->id();
        $events = Event::where("is_approved", false)
            ->where("organizer_id", $organizerId)
            ->get();
        return view("organizer.dashboard.events.index", compact("events"));
    }



    public function store(EventRequest $request)
    {
        $userId = Auth::id();

        $organizer = Organizer::where('user_id', $userId)->first();

        if (!$organizer) {
            return redirect()->back()->with('alert', 'No organizer found for the current user.');
        }

        $organizerId = $organizer->id;

        $unapprovedEventExists = Event::where('organizer_id', $organizerId)
            ->where('is_approved', false)
            ->exists();

        if ($unapprovedEventExists) {
            return redirect()->back()->with('alert', 'Cannot create an event until the first event is approved.');
        }

        $eventData = $request->validated();
        $eventData['organizer_id'] = $organizerId;
        $eventData['is_approved'] = false;

        $event = Event::create($eventData);

        if ($request->hasFile("event_image")) {
            $event->addMediaFromRequest("event_image")->toMediaCollection('eventImage', 'media');
        }

        return redirect()->back()->with('status', 'Your event has been created successfully and is pending approval.');
    }



    public function delete(Request $request){
        $id = $request->input("event_id");
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route("organizer.events");
    }



    public function edit($id)
    {
        $event  = Event::findOrFail($id);
        $categories = Category::all();
        return view("organizer.dashboard.events.edit", compact("categories", "event"));
    }

    public function update(Request $request, $id)
    {
        $event  = Event::findOrFail($id);
        $event->update($request->only(['titre', 'description', 'date', 'lieu', 'category_id', 'places_Disponible', 'auto_accept']));
        return redirect()->route("organizer.events");
    }



//    public function store(EventRequest $request)
//    {
//        $organizerId = $request->input('organizer_id');
//
//        $unapprovedEventExists = Event::where('organizer_id', $organizerId)
//            ->where('is_approved', false)
//            ->exists();
//
//        if ($unapprovedEventExists) {
//            return redirect()->back()->with('alert', 'Cannot create an event until the first event is approved.');
//        }
//
//        $eventData = $request->validated();
//        $eventData['organizer_id'] = $organizerId;
//        $eventData['is_approved'] = false;
//
//
//        $event = Event::create($eventData);
//
//        if ($request->hasFile("event_image")) {
//            $event->addMediaFromRequest("event_image")->toMediaCollection('eventImage', 'media');
//        }
//
//        return redirect()->back()->with('status', 'Your event has been created successfully and is pending approval.');
//    }



//    public function approveUser(Request $request, $eventId, $userId)
//    {
//        $event = Event::findOrFail($request->titre);
//        $user = User::findOrFail($request->username);
//        $event->users()->updateExistingPivot($userId, ['is_approved' => true]);
//
//        return back()->with('success', 'User approved successfully!');
//    }



}
