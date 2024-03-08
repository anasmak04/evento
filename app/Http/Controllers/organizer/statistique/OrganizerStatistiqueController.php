<?php

namespace App\Http\Controllers\organizer\statistique;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrganizerStatistiqueController
{


    public function index()
    {
        $total_users = User::count();
        $total_categories = Category::count();
        $total_events = Event::where("organizer_id", Auth::id())->count();
        $events = Event::where("organizer_id", Auth::id())->get();
        $total_reservations = 0;


        foreach ($events as $event){
            $total_reservations +=  $event->users()->wherePivot("is_approved", true)->count();
        }

        $total_reservation = $total_reservations;
        return view("organizer.dashboard" , compact("total_users", "total_categories", "total_events", "total_reservation"));
    }
}
