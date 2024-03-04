<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    //

    public function index()
    {
        $users = User::with("roles")->get();
        return view("dashboard" , compact("users"));
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($request->user_id);

        $user->roles()->attach([$request->role_id]);
        return redirect()->back();
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }







}
