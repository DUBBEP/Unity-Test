<?php

use App\Http\Controllers\GameObjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::controller(GameObjectController::class)->group(function () {
    Route::get('/GameObjects', 'index');
    Route::get('/GameObjects/{GameObject}', 'show');
    Route::post('/GameObjects', 'store');
});

Route::get('/test', function () {
    return response()->json(['message' => 'Unity, I can hear you!']);
});
*/