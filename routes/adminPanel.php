<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Http\Request;


use App\Http\Controllers\UserController;


Route::resource('Users', UserController::class)->middleware(['auth']);

Route::get('/Solutions', function () {
    return view('App.Back.solutions');
})->middleware(['auth'])->name('Solutions');

Route::get('/Reports', function () {
    return view('App.Back.reports');
})->middleware(['auth'])->name('Reports');

Route::get('/Settings', function () {
    $levels = \App\Models\Level::all();


    return view('App.Back.settings')->with([
        'levels' => $levels
    ]);
})->middleware(['auth'])->name('Settings');


//ajax request
Route::post('/Issues/updateData/{id}', function ($id, Request $request) {
    $issue = Issue::find($id);

    $priority = $request->priority;
    $level = $request->level;
    $status = $request->status;

    $issue->priority_id = $priority;
    $issue->level_id = $level;
    $issue->status_id = $status;

    $issue->save();

    return array(
        'data' => true
    );
});



