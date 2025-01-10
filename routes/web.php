<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;

Route::view('/', 'home');

Route::resource('jobs',JobController::class);

Route::view('/contact', 'contact');

//Auth
Route::get('/register',[RegisterUserController::class,'create']);
Route::post('/register',[RegisterUserController::class,'store']);

Route::get('/login',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
