<?php

use Illuminate\Support\Facades\Route;



Route::get('/Dashboard', function () {
    return view('App.Back.dashboard');
})->middleware(['auth'])->name('Dashboard');

Route::get('/Issues', function () {
    return view('App.Back.issues');
})->middleware(['auth'])->name('Issues');

Route::get('/Users', function () {
    return view('App.Back.user');
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



