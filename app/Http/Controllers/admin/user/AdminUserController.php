<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view("admin.dashboard.user.index", compact("users"));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }



    public function updateStatus(User $user, Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $user->update([
            'status' => $request->input('status'),
        ]);

        return back()->with('success', 'User status updated successfully.');
    }








}
