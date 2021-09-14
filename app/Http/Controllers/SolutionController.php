<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Solution;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{


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
