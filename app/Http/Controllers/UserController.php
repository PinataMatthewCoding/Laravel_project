<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // DISPLAY A LISTING OF THE RESOURCE
    public function index()
    {
        $users = User::all();
        return response()->json(["success"=>true,"data"=>$users],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE
    public function store(UserStoreRequest $request)
    {
        $user = User::store($request);
        return response()->json(["success" =>true, "data" =>$user],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json(["success" =>true, "data" =>$user],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE
    public function update(Request $request, string $id)
    {
        $user = User::find($id)->update(
        [
            "name" =>$request->input("name"),
            "gender" =>$request->input("gender"),
            "email" =>$request->input("email"),
            "password" =>Hash::make($request->password),
            "phone_number" => $request->input("phone_number"),
            "province" => $request->input("province"),
        ]);
        return response()->json(["success" =>true, "data" =>$user],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return response()->json(["success" =>true, "data" =>$user],200);
    }
}