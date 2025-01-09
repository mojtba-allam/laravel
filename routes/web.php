<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::controller(JobController::class)->group(function(){
Route::get('/jobs','index');
Route::get('/create','create');
Route::post('/jobs','store');
Route::get('/jobs/{job}', 'show');
Route::patch('/jobs/{job}', 'update');
Route::delete('/jobs/{job}', 'delete');
Route::get('/jobs/{job}/edit', 'edit');
});

Route::view('/contact', 'contact');
