<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\SettingsRouterController;
use App\Models\Issue;
use App\Models\Message;


Route::resource('Team', TeamController::class);

Route::resource('Priority', PriorityController::class);

Route::resource('Level', LevelController::class);

Route::resource('Status', StatusController::class);

Route::resource('Group', GroupController::class);

Route::resource('Type', TypeController::class);

Route::resource('Issues', IssueController::class)->middleware(['auth']);

Route::resource('Solution', SolutionController::class);

Route::resource('Level', LevelController::class);

Route::post('/settings/View', [SettingsRouterController::class,'loadView']);


//home

Route::get('/home/Issues', function () {
    $issues = Issue::where('user_id',Auth::user()->id)->with('Status')->get();

    return view('App.Front.listIssues')->with([
        'issues' => $issues
    ]);
});

Route::get('/home/Issues/{id}', function ($id) {
    $issue = Issue::where('id',$id)->with('Status')->get();
    $messages = Message::where('issue_id',$issue[0]->id)->get();


    return view('App.Front.homeIssue')->with([
        'issue' => $issue[0],
        'messages' => $messages
    ]);
});



