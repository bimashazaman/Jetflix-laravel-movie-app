<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;


Route::get('/' ,[MovieController::class,'index'])->name('movies.index');
Route::get('/movies/{movie}' ,[MovieController::class,'show'])->name('movies.show');


Route::get('/actors' ,[ActorController::class,'index'])->name('actors.index');
Route::get('/actors/{actor}' ,[MovieController::class,'show'])->name('actors.show');
Route::get('/actors/page/{page?}' ,[MovieController::class,'show']);



