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


Route::resource('Team', TeamController::class);

Route::resource('Priority', PriorityController::class);

Route::resource('Level', LevelController::class);

Route::resource('Status', StatusController::class);

Route::resource('Group', GroupController::class);

Route::resource('Type', TypeController::class);

Route::resource('Issues', IssueController::class);

Route::resource('Solution', SolutionController::class);



