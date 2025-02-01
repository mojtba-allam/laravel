<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\EmployerController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use App\Jobs\Superman;
Route::get('test', function(){
    $job=Job::first();
    Superman::dispatch($job);
    return 'Email sent';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Define the routes for the JobController
Route::resource('/jobs', JobController::class)->only(['index', 'store']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

    Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

// Authentication routes
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
