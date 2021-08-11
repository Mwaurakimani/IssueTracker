<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('Users',UserController::class)->middleware(['auth']);

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



