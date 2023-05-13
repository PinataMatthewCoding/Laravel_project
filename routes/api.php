<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// API ROUTE OF USER
Route::get("/users", [UserController::class, "index"]);
Route::post("/user", [UserController::class, "store"]);
Route::get("/user/{id}", [UserController::class, "show"]);
Route::put("/user/{id}", [UserController::class, "update"]);
Route::delete("/user/{id}", [UserController::class, "destroy"]);
// API ROUTE OF EVENT
Route::get("/events", [EventController::class, "index"]);
Route::post("/event", [EventController::class, "store"]);
Route::get("/event/{id}", [EventController::class, "show"]);
Route::put("/event/{id}", [EventController::class, "update"]);
Route::delete("/event/{id}", [EventController::class, "destroy"]);
// API ROUTE OF TEAM
Route::get("/teams", [TeamController::class, "index"]);
Route::post("/team", [TeamController::class, "store"]);
Route::get("/team/{id}", [TeamController::class, "show"]);
Route::put("/team/{id}", [TeamController::class, "update"]);
Route::delete("/team/{id}", [TeamController::class, "destroy"]);
