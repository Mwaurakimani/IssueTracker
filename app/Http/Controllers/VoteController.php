<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $id = $request->id;
        $cast_vote = $request->vote;

        $exist = $this->if_vote_exist($id, Auth::user()->id, $cast_vote);

        if ($exist) {
            return array(
                'data' => 1
            );
        }else{
            $vote = Vote::where('solution_id', $id)
                ->where('user_id',  Auth::user()->id)
                ->get();

            if(count($vote) > 0){
                $vote = $vote[0];

                $vote->vote = $cast_vote;
                $vote->save();

                return array(
                    'data' => 2
                );
            }
        }

        $vote = new Vote();

        $vote->solution_id = $id;
        $vote->user_id = Auth::user()->id;
        $vote->vote = $cast_vote;

        $vote->save();


        return array(
            'data' => 0
        );
    }

    public function if_vote_exist($solution_id, $user_id, $vote)
    {
        $vote = Vote::where('solution_id', $solution_id)
            ->where('vote', $vote)
            ->where('user_id', $user_id)
            ->get();

        if (count($vote)) {
            return true;
        } else {
            return false;
        }
    }
}
