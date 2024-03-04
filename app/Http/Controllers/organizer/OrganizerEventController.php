<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;

class OrganizerEventController extends Controller
{

    public function index()
    {
        return view("organizer.event.create");
    }


}
