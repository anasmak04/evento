<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{


    public function index()
    {
        return view("admin.dashboard.user.index");
    }
}
