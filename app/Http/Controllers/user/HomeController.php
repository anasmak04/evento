<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view("user.index");
    }







}
