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

// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// })->name('logout');
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

    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('links', SocialLinkController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/{username}', [PortofolioController::class, 'show'])->name('portfolio.show');
