<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Http\Request;


use App\Http\Controllers\UserController;


Route::resource('Users', UserController::class)->middleware(['auth']);

Route::get('/Solutions', function () {
    return view('App.Back.solution.solutions');
})->middleware(['auth'])->name('Solutions')->middleware(['auth']);;

Route::get('/Reports', function () {
    return view('App.Back.Reports.reports');
})->middleware(['auth'])->name('Reports')->middleware(['auth']);;

Route::get('/Settings', function () {
    $levels = \App\Models\Level::all();


    return view('App.Back.settings')->with([
        'levels' => $levels
    ]);
})->middleware(['auth'])->name('Settings');

Route::post('/sortIssues',[\App\Http\Controllers\IssueController::class,'sort_issues'])->middleware(['auth'])->name('sort_issues');


//ajax request
Route::post('/Issues/updateData/', function (Request $request) {
    $issue = Issue::find($request->id);

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
})->middleware(['auth']);;



