<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PageController;
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

// Static pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactStore']);

// Jobs routes
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job')
    ->name('jobs.edit');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

// Authentication routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
