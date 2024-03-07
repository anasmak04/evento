<?php

namespace App\Http\Controllers\organizer\event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

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
        $organizerId = $request->input('organizer_id');

        $unapprovedEventExists = Event::where('organizer_id', $organizerId)
            ->where('is_approved', false)
            ->exists();

        if ($unapprovedEventExists) {
            return redirect()->back()->with('alert', 'Cannot create an event until the first event is approved.');
        }

        $eventData = $request->all();
        $eventData['organizer_id'] = $organizerId;

        $eventData['is_approved'] = false;

        $event = Event::create($eventData);

        if ($request->hasFile("event_image")) {
            $event->addMediaFromRequest("event_image")->toMediaCollection('eventImage', 'media');
        }

        // Assuming the event creation process is successful
        return redirect()->back()->with('status', 'Your event has been created successfully and is pending approval.');
    }






//    public function approveUser(Request $request, $eventId, $userId)
//    {
//        $event = Event::findOrFail($request->titre);
//        $user = User::findOrFail($request->username);
//        $event->users()->updateExistingPivot($userId, ['is_approved' => true]);
//
//        return back()->with('success', 'User approved successfully!');
//    }



}
