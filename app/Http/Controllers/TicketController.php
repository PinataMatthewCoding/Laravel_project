<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Resources\ShowTicketResource;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // DISPLAY A LISTING OF THE RESOURCE
    public function index()
    {
        $tickets = Ticket::all();
        $tickets = TicketResource::collection($tickets);
        return response()->json(["success" =>true, "data" =>$tickets],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE
    public function store(TicketStoreRequest $request)
    {
        $ticket = Ticket::store($request);
        return response()->json(["success" =>true, "data" =>$ticket],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket = new ShowTicketResource($ticket);
        return response()->json(["success" =>true, "data" =>$ticket],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id)->update(
            [
                "zone" =>$request->input("zone"),
                "price" =>$request->input("price"),
                "event_id" =>$request->input("event_id"),
                "buy_ticket" =>$request->input("buy_ticket"),
            ]
        );
        return response()->json(["success" =>true, "data" =>$ticket],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id)->delete();
        return response()->json(["success" =>true, "data" =>$ticket],200);
    }
}
