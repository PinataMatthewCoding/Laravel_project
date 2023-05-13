<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamStoreRequest;
use App\Http\Resources\ShowTeamResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // DISPLAY A LISTING OF THE RESOURCE
    public function index()
    {
        $teams = Team::all();
        $teams = TeamResource::collection($teams);
        return response()->json(["success" =>true, "data" =>$teams],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE
    public function store(TeamStoreRequest $request)
    {
        $team = Team::store($request);
        return response()->json(["success" =>true, "data" =>$team],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE
    public function show(string $id)
    {
        $team = Team::find($id);
        $team = new ShowTeamResource($team);
        return response()->json(["success" =>true, "data" =>$team],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE
    public function update(Request $request, string $id)
    {
        $team = Team::find($id)->update(
            [
                "team_name" =>$request->input("team_name"),
                "member" =>$request->input("member"),
                "user_id" =>$request->input("user_id"),
            ]
        );
        return response()->json(["success" =>true, "data" =>$team],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $team = Team::find($id)->delete();
        return response()->json(["success" =>true, "data" =>$team],200);
    }
}
