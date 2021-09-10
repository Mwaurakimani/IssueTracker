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
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\VoteController;


Route::resource('Team', TeamController::class)->middleware(['auth']);;

Route::resource('Priority', PriorityController::class)->middleware(['auth']);

Route::resource('Level', LevelController::class)->middleware(['auth']);

Route::resource('Status', StatusController::class)->middleware(['auth']);

Route::resource('Group', GroupController::class)->middleware(['auth']);

Route::resource('Type', TypeController::class)->middleware(['auth']);

Route::resource('Issues', IssueController::class)->middleware(['auth']);

Route::resource('Solution', SolutionController::class)->middleware(['auth']);

Route::resource('Level', LevelController::class)->middleware(['auth']);

Route::post('/settings/View', [SettingsRouterController::class,'loadView'])->middleware(['auth']);


//home

Route::get('/home/Issues', function () {
    $issues = Issue::where('user_id',Auth::user()->id)->with('Status')->get();

    return view('App.Front.listIssues')->with([
        'issues' => $issues
    ]);
})->middleware(['auth']);

Route::get('/Account', function () {
    return view('App.Front.Account');
})->middleware(['auth']);

Route::put('/Account/ChangePassword/{id}', function (Request  $request) {
    $password = ($request->new_password);

    $validated = $request->validate([
        'current_password' => [
            'required',
            'max:255',
            function($attribute,$value,$fail){
                $password = Auth::user()->password;
                $check = Hash::check($value,$password);

                if(!$check){
                    $fail("The ".$attribute." doses not match");
                }
            }],
        'new_password' => 'required|max:255|different:current_password',
        'confirm_password' => ['required','max:255','same:new_password']
    ]);

    $user = User::find( \Illuminate\Support\Facades\Auth::user()->id);

    $user->password = bcrypt($validated['new_password']);

    $user->save();

    $request->session()->flash('message', 'Was updated Successfully');

    return redirect()->back();


})->middleware(['auth']);

Route::get('/home/Issues/{id}', function ($id) {
    $issue = Issue::where('id',$id)->with('Status')->get();
    $messages = Message::where('issue_id',$issue[0]->id)->get();


    return view('App.Front.homeIssue')->with([
        'issue' => $issue[0],
        'messages' => $messages
    ]);
})->middleware(['auth']);

Route::get('/Solutions/dashboard/{id}', function ($id) {
    $solution = \App\Models\Solution::find($id);
    return view('App.Back.solution.solutionForm')->with([
        'solution' => $solution
    ]);
})->middleware(['auth']);

Route::get('/Solutions/dashboard', function () {
    return view('App.Back.solution.solutionForm');
})->middleware(['auth']);


Route::post('/solution/update/{id}', function ($id , Request $request) {
    $title = $request->input('title');
    $Description = $request->input('description');

    $solution = \App\Models\Solution::find($id);

    $solution->title = $title;
    $solution->Description = $Description;

    $solution->save();

    $request->session()->flash('message', 'Was updated Successfully');

    return redirect()->back();
})->middleware(['auth']);

Route::post('/solution/create', function (Request $request) {
    $title = $request->input('title');
    $Description = $request->input('description');

    $solution = new \App\Models\Solution();

    $solution->title = $title;
    $solution->Description = $Description;
    $solution->user = Auth::user()->id;
    $solution->issue = 1;
    $solution->rating = 0;


    $solution->save();

    $request->session()->flash('message', 'Was created Successfully');

    return redirect()->back();
})->middleware(['auth']);

Route::post('/solutionVoting',[VoteController::class,'vote']);


