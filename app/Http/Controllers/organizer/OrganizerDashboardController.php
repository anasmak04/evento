<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        return view("organizer.dashboard");
    }
}
