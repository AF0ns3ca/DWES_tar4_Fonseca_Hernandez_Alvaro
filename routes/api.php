<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Ruta acciones user
Route::apiResource('users', UserController::class);
//Metodo delete user
// Route::delete('users/{id}', [UserController::class, 'destroy']);


//Ruta acciones user_detail
Route::apiResource('user_details', UserDetailController::class);

//Ruta acciones organizer
Route::apiResource('organizers', OrganizerController::class);

//Ruta acciones participant
Route::apiResource('participants', ParticipantController::class);

//Ruta acciones event
Route::apiResource('events', EventController::class);

//Ruta acciones event_participant
Route::apiResource('event_participants', EventParticipantController::class);

