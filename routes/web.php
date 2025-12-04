<?php

use App\Http\Controllers\LearningController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

use function PHPSTORM_META\map;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
        })->name('dashboard');
        Route::get('/contacts', [UserController::class, 'index'])->name('contact');
        Route::get('/contact/{id}/detail', [UserController::class, 'edit'])->name('contact.detail');
    });
