<?php

namespace App\Http\Controllers\organizer\reservation;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


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

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        if ($event->date->isPast()) {
            return redirect()->back()->with('error', 'This event has already occurred and cannot be reserved.');
        }

        $isApproved = (bool)$event->auto_accept;
        $event->users()->attach($userId, ['is_approved' => $isApproved]);

        if (!$isApproved) {
            return redirect()->back()->with('success', 'Your reservation request has been submitted and is awaiting approval.');
        }

        $user = auth()->user();
        $eventName = $event->name;
        $eventLieu = $event->location;
        $ticketIdentifier = (string) Str::uuid();

        $data = [
            'userName' => $user->name,
            'eventName' => $eventName,
            'eventLieu' => $eventLieu,
            'ticketIdentifier' => $ticketIdentifier,
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.event_reservation', $data);


        return $pdf->download('event-reservation-' . $userId . '-' . $eventId . '.pdf');
    }







    public function updateAutoAccept(Event $event, Request $request)
    {
        $userId = $request->user_id;
        $user = User::findOrFail($userId);

        $event->update([
            'auto_accept' => true,
        ]);

        if ($event->users()->where('user_id', $userId)->exists()) {
            $event->users()->updateExistingPivot($userId, ['is_approved' => true]);

            \Mail::to($user->email)->send(new \App\Mail\TicketMail($event, $user));

            return redirect()->back()->with('success', 'Event auto-accept status updated and user approved successfully. Ticket emailed.');
        } else {
            return redirect()->back()->with('error', 'The specified user does not have a reservation for this event.');
        }
    }





}
