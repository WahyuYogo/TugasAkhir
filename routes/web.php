<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\ClaimUrl as LivewireClaimUrl;

Route::get('/', function () {
    return view('home');
});

Route::get('/user/{slug}', [UserController::class, 'show'])->name('portfolio.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.user');
    })->name('dashboard');
    Route::get('/claim-url', function () {
        return view('url');
    })->name('claim.url');
});
