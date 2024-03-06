<?php

namespace App\Http\Controllers\organizer\reservation;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class ReservationController extends Controller
{


//    public function index()
//    {
//        $user = auth()->user();
//        $reservations = $user->events()->wherePivot('is_approved', true)->get();
//        return view('user.reservation.index', compact('reservations'));
//    }


    public function index()
    {
        $organizerId= auth()->id();

        $events = Event::where("auto_accept", false)
            ->where("organizer_id", $organizerId)->get();
        return view("organizer.dashboard.reservation.index", compact("events"));
    }




    public function reserveEvent(Request $request)
    {
        $userId = auth()->id();
        $eventId = $request->event_id;
        $event = Event::find($eventId);

        if ($event->auto_accept) {
            $event->users()->attach($userId, ['is_approved' => true]);
        } else {
            $event->users()->attach($userId, ['is_approved' => false]);
        }

        return redirect()->route("home.index");
    }


    public function updateAutoAccept(Event $event, Request $request)
    {

        $autoAcceptStatus = $request->input('auto_accept', false);

        $event->update([
            'auto_accept' => $autoAcceptStatus,
        ]);

        return redirect()->back()->with('success', 'Event auto-accept status updated successfully.');
    }

}
