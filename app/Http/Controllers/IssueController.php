<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

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

        return view('App.Back.Issue.issues')->with([
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
     * @param \Illuminate\Http\Request $request
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
        $Issue->user_id = Auth::user()->id;
        $Issue->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue, $id)
    {
        $issue = Issue::withTrashed()->find($id);

        $messages = Message::where('issue_id', $issue->id)->orderBy('created_at', 'asc')->get();

        return view('App.Back.Issue.issueForm')->with([
            'issue' => $issue,
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }

    public function sort_issues(Request $request)
    {
        $response = null;

        $Sort = $request->Sort;
        $Status = $request->Status;
        $Priority = $request->Priority;
        $Level = $request->Level;
        $Transition = $request->Transition;

        $query = Issue::select('*');


        if ($Status != 0) {
            $query = $query->where('status_id', $Status);
        }
        if ($Priority != 0) {
            $query = $query->where('priority_id', $Priority);
        }
        if ($Level != 0) {
            $query = $query->where('level_id', $Level);
        }
        if ($Sort != 0) {
            switch ($Sort) {
                case '1':
                    $query = $query->orderBy('created_at', 'ASC');
                    break;
                case '2':
                    $query = $query->orderBy('created_at', 'DESC');
                    break;

            }
        }
        if ($Transition != 0) {
            $query = $query->onlyTrashed();
        }

        $response = $query->get();

        $data = view('components.Layouts.Lists.Issues-list')
            ->with([
                'issues' => $response,
            ])
            ->render();

        return $data;
    }
}
