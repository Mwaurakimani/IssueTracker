<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::with('User')
            ->with('Priority')
            ->with('Level')
            ->with('Status')
            ->get();

//        dd($issues);

        return view('App.Back.issues')->with([
            'issues' => $issues
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('App.Front.createIssue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Subject' => 'required',
            'Description' => 'required|max:3000',
        ]);

        $Issue = new Issue();

        $Issue->subject = $validated['Subject'];
        $Issue->description = $validated['Description'];
        $Issue->priority_id = 1;
        $Issue->status_id = 1;
        $Issue->team_id = 1;

        $Issue->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue,$id)
    {
        $issue = Issue::find($id);

        $messages = Message::where('issue_id',$issue->id)->orderBy('created_at','asc')->get();

        return view('App.Back.Issue.issueForm')->with([
            'issue'=> $issue,
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
