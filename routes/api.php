<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TennisController;
use App\Http\Controllers\TournamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('status', function () {
    return 'ok';
});
Route::resource('player', PlayerController::class);
Route::resource('tournament', TournamentController::class);
Route::post('simulate', [TennisController::class, 'simulate']);
