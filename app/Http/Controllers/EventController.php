<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use App\Models\EventTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EventController extends Controller
{
    // DISPLAY A LISTING OF THE REOURCE
    public function index()
    {
        $events = Event::all();
        $events = EventResource::collection($events);
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
        $event = new ShowEventResource($event);
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
                "created_by" =>$request->input("user_id"),
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


    // FUNTION EVENTTEAM
    public function eventeam(){
        $t = EventTeam::create([
            "event_id" =>request("event_id"),
            "team_id" =>request("team_id"),
        ]);
        return response()->json(["success" =>true, "data" =>$t],200);
    }

    // SEARCH NAME OF EVENT
    public function searchEvent($name)
    {
        $events = Event::where("event_name",'like','%' .$name .'%')->get();
        return $events;
    }
}