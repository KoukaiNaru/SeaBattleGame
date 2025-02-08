<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/game',[GameController::class,'createGame']);
//Route::get('/game/{id}',[GameController::class,'getGame']);
//Route::put('/game/{id}',[GameController::class,'updateGame']);
//Route::delete('/game/{id}',[GameController::class,'deleteGame']);

Route::get('/get-csrf',function (){
    return csrf_token();
});
