<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Solution;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solution $solution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        //
    }

    public function add_comment(Request $request)
    {
        //get the solution
        $solution = Solution::find($request->id);

        //get the user
        $user = Auth::user()->id;

        //get the vote id
        $vote = Vote::where('user_id', $user)->
        where('solution_id', $solution->id)
            ->get();

        $comment = comment::where('user_id', $user)->where('solution_id', $solution->id)->get();
        $stmt = null;
        if(count($comment) == 0){
            $stmt = "empty";
            $comment = new comment();

        }else{
            $stmt = "not empty";
            $comment = $comment[0];
        }

        $comment->comment = $request->comment;
        $comment->user_id = $user;
        $comment->solution_id = $solution->id;
        $comment->vote_id = $vote[0]->id;

        $comment->save();

        return true;
    }
}
