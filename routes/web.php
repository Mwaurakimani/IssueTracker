<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Message;

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

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});


Route::get('/Dashboard', function () {
    $title = Auth::user()->title;

    if ($title == 'Admin') {
        return view('App.Back.dashboard');
    } elseif ($title == 'Technician') {
        return view('App.Back.dashboard');
    } else {
        return redirect('/');
    }
})->middleware(['auth'])->name('Dashboard');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware(['auth'])->name('Dashboard');

//test


//ajax requests
Route::post('getItem', [\App\Http\Controllers\SettingsRouterController::class, 'getItem']);

Route::post('updateItem', [\App\Http\Controllers\SettingsRouterController::class, 'updateItem']);

Route::delete('/deleteItem', [\App\Http\Controllers\SettingsRouterController::class, 'destroy']);

Route::post('createItem', [\App\Http\Controllers\SettingsRouterController::class, 'createItem']);


Route::post('/Issues/sendMessage', function (Request $request) {
    $message_data = $request->message_entry;
    $issue_id = $request->issue_id;

    $message = new Message();
    $message->issue_id = $issue_id;
    $message->user_id = Auth::user()->id;
    $message->message = $message_data;

    $message->save();

    return array(
        'name' => Auth::user()->name,
        'request' => $request->message_entry
    );
});

Route::post('/Issues/sendMessage', function (Request $request) {
    $message_data = $request->message_entry;
    $issue_id = $request->issue_id;

    $message = new Message();
    $message->issue_id = $issue_id;
    $message->user_id = Auth::user()->id;
    $message->message = $message_data;

    $message->save();

    return array(
        'name' => Auth::user()->name,
        'request' => $request->message_entry
    );
})->middleware(['auth']);;

//test

Route::get('/Issue/Delete/{id}', function ($id) {
    $issue = \App\Models\Issue::find($id);

    $issue->delete();

    return redirect('/Issues');
})->middleware(['auth']);

Route::get('/home/Solutions/{id}', function ($id) {
    $solution = \App\Models\Solution::find($id);

    return view('App.Front.homeSolution')->with([
        'solution' => $solution
    ]);
})->middleware(['auth']);;


require 'adminPanel.php';

require __DIR__ . '/auth.php';

require __DIR__ . '/resources.php';
