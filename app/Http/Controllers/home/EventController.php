<?php

namespace App\Http\Controllers\home;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{



    public function index(Request $request)
    {
        $searchKey = $request->input("searchKey");
        if ($searchKey) {
            $events = Event::where("titre", 'LIKE', "%{$searchKey}%")->get();
        } else {
            $events = Event::where("is_approved", true)->paginate(8);
        }

        $categories = Category::all();
        return view("user.index", compact("events", "categories"));
    }





    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view("user.details", compact("event"));
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("");
    }


    public function store(StoreEventRequest $event , Request $request)
    {
        Event::create($request->validated());

        return redirect()->route("");
    }


    public function update(UpdateEventRequest $event , Request $request)
    {
        $event->update($request->validated());
        return redirect()->route("");
    }





}
