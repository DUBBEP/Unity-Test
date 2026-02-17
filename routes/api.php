<?php

use App\Http\Controllers\GameObjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(GameObjectController::class)->group(function () {
    Route::get('GameObjects/names','getNames');
    Route::get('GameObjects/count','getCount');    
    Route::get('GameObjects/ids','getIds');
    Route::get('/GameObjects', 'index');
    Route::get('/GameObjects/{id}', 'show');
    Route::post('/GameObjects', 'store');

});

Route::get('/test', function () {
    return response()->json(['message' => 'Unity, I can hear you!']);
});