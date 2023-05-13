<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EventController extends Controller
{
    // DISPLAY A LISTING OF THE REOURCE
    public function index()
    {
        $events = Event::all();
        return response()->json(["success"=>true,"data"=>$events],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE
    public function store(EventStoreRequest $request)
    {
        $event = Event::store($request);
        return response()->json(["success" =>true, "data" =>$event],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json(["success" =>true, "data" =>$event],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE
    public function update(Request $request, string $id)
    {
        $event = Event::find($id)->update(
            [
                "event_name" =>$request->input("event_name"),
                "date" =>$request->input("date"),
                "location" =>$request->input("location"),
                "description" =>$request->input("description"),
            ]
        );
        return response()->json(["success" =>true, "data" =>$event],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $event = Event::find($id)->delete();
        return response()->json(["success" =>true, "data" =>$event],200);
    }
}