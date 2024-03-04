<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_categories = Category::count();
        $total_events = Event::count();
        return view("organizer.dashboard" , compact("total_users", "total_categories", "total_events"));
    }
}
