<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view(uri: '/login', view: 'auth.login')->name('login');
Route::view(uri: '/register', view: 'auth.register')->name('register');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth')->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard.user');
})->middleware('auth');
