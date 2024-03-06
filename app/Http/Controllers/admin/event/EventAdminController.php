<?php

namespace App\Http\Controllers\admin\event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{

        public function index()
        {
            $events = Event::with("users")->get();
            return view("admin.events.index" , compact("events"));
        }


    public function update(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $isApproved = $request->input('is_approved');
        $event->update(['is_approved' => $isApproved]);
        return redirect()->back()->with('success', $isApproved ? 'Event approved successfully!' : 'Event rejected successfully!');
    }



}
