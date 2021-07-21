<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('App.Front.Home');
});


Route::get('/Dashboard', function () {
    return view('App.Back.dashboard');
})->middleware(['auth'])->name('Dashboard');


Route::get('/Dashboard', function () {
    return view('App.Back.dashboard');
})->middleware(['auth'])->name('Dashboard');

Route::get('/{id}/MyIssues', [IssueController::class,'listMyIssues'])->middleware(['auth'])->name('MyIssues');

Route::get('/{id}/MyIssues/{issue_id}', [IssueController::class,'sortIssue'])->middleware(['auth'])->name('MyIssues');

Route::get('/Dashboard/Issue/{id}', [IssueController::class,'dashboardIssueOpen'])->middleware(['auth'])->name('MyIssues');






require 'adminPanel.php';

require __DIR__.'/auth.php';

require __DIR__.'/resources.php';
