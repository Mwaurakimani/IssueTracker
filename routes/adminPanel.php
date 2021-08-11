<?php

use Illuminate\Support\Facades\Route;


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
    $levels = \App\Models\Level::all();


    return view('App.Back.settings')->with([
        'levels'=> $levels
    ]);
})->middleware(['auth'])->name('Settings');



