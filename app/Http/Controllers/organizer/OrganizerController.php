<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    public function index()
    {
        return view("organizer.organizer-fill-infos");
    }


    public function show()
    {

    }

    public function becomeOrganizer(Request $request) {

        DB::beginTransaction();

        try {

            $organizer = new Organizer();
            $organizer->user_id = Auth::id();
            $organizer->save();

            $organization = new Organisation();
            $organization->organizer_id = $organizer->id;
            $organization->name = $request->name;
            $organization->description = $request->description;
            $organization->save();

            $user = Auth::user();
            $user->roles()->attach([2]);

            DB::commit();

            return redirect()->route("home.index");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }


    }







}
