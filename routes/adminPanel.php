<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/Users', function () {
    $users = User::all();

    return view('App.Back.user')->with([
        'users'=> $users
    ]);
})->middleware(['auth'])->name('Users');

Route::get('/Solutions', function () {
    return view('App.Back.solutions');
})->middleware(['auth'])->name('Solutions');

Route::get('/Reports', function () {
    return view('App.Back.reports');
})->middleware(['auth'])->name('Reports');

Route::get('/Settings', function () {
    return view('App.Back.settings');
})->middleware(['auth'])->name('Settings');



