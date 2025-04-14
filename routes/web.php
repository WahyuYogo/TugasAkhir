<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {
    return view('templates.template01');
});

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

    Route::get('/template', [TemplateController::class, 'index'])->name('select-template');
    Route::post('/template', [TemplateController::class, 'store']);

    Route::resource('skills', SkillController::class)->only(['index', 'store', 'destroy', 'update']);
    Route::resource('projects', ProjectController::class)->only(['index', 'store', 'destroy', 'update']);
    Route::resource('links', SocialLinkController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);

    Route::get('/profile', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/{username}', [PortofolioController::class, 'show'])->name('portfolio.show');
