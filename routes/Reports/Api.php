<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

Route::post('/filterReports', function (Request $request) {
    $elem = $request->resource;
    $attr = $request->attribute;


    $query = null;
    switch ($elem) {
        case '0':
            //Issue
            $query = \App\Models\Issue::select('*');

            switch ($attr) {
                case '0':
                    //all
                    $query = $query->get();

                    $data = view('components.Elements.Tables.issues-table')
                        ->with([
                            'issues' => $query,
                            'table' => '.Issues-table'
                        ])
                        ->render();

                    return [$data];
                    break;
                case '1':
                    //Solved

                    $status = \App\Models\Status::all();

                    $id = null;

                    foreach ($status as $Stat) {
                        if($Stat->name == 'Resolved'){
                            $id = $Stat->id;
                        }
                    }

                    $query = $query->where('status_id',$id)->get();

                    $data = view('components.Elements.Tables.issues-table')
                        ->with([
                            'issues' => $query,
                            'table' => '.Issues-table'
                        ])
                        ->render();

                    return [$data];

                    break;
                case '2':
                    //Unresolved
                    $status = \App\Models\Status::all();

                    $id = null;

                    foreach ($status as $Stat) {
                        if($Stat->name == 'Unresolved'){
                            $id = $Stat->id;
                        }
                    }

                    $query = $query->where('status_id',$id)->get();

                    $data = view('components.Elements.Tables.issues-table')
                        ->with([
                            'issues' => $query,
                            'table' => '.Issues-table'
                        ])
                        ->render();

                    return [$data];
                    break;
            }

            break;
        case '1':
            //solutions
            $query = \App\Models\Solution::select('*');

            switch ($attr) {
                case '0':
                    $query = $query->get();

                    $data = view('components.Elements.Tables.solutions-table')
                        ->with([
                            'issues' => $query,
                            'table' => 'solutions-report-table'
                        ])
                        ->render();

                    return [$data];

                    break;
                case '1':
                    //Up-voted
                    $upvotes = DB::select(DB::raw("SELECT solution_id,id,SUM(vote) as votes FROM `votes` WHERE vote=1 group BY solution_id"));
                    $downvotes = DB::select(DB::raw("SELECT solution_id,id,vote FROM `votes` WHERE vote=0"));


                    $ids_value = array();

                    foreach ($upvotes as $record){
                        $negative_instances = 0;
                        foreach ($downvotes as $downvote) {
                            if($downvote->solution_id == $record->solution_id){
                                $negative_instances++;
                            }
                        }


                        $indicator = intval($record->votes) - intval($negative_instances);

                        if($indicator > 0){
                            array_push($ids_value,[$record->solution_id,$negative_instances]);
                        }
                    }



                    $solution = array();

                    foreach ($ids_value as $id){
                        $sol = \App\Models\Solution::where('id',$id[0])->get();

                        array_push($solution,$sol);
                    }

                    $data = view('components.Elements.Tables.solutions-table')
                        ->with([
                            'issues' => $solution[0],
                            'table' => 'solutions-report-table'
                        ])
                        ->render();

                    return [$data];


                    break;
                case '2':
                    //down-voted

                    //get all solutions with a vote
                    $solutions_with_votes = DB::select(DB::raw("SELECT * FROM solutions LEFT JOIN votes ON solutions.id = votes.solution_id where votes.id <> 'null' group BY solutions.id"));

                    //Up-voted
                    $upvotes = DB::select(DB::raw("SELECT solution_id,id,SUM(vote) as votes FROM `votes` WHERE vote=1 group BY solution_id"));
                    $downvotes = DB::select(DB::raw("SELECT solution_id,id,vote FROM `votes` WHERE vote=0"));


                    $ids_value = array();

                    foreach ($upvotes as $record){
                        $negative_instances = 0;
                        foreach ($downvotes as $downvote) {
                            if($downvote->solution_id == $record->solution_id){
                                $negative_instances++;
                            }
                        }


                        $indicator = intval($record->votes) - intval($negative_instances);

                        if($indicator > 0){
                            array_push($ids_value,[$record->solution_id,$negative_instances]);
                        }
                    }



                    $solution = array();

                    foreach ($ids_value as $id){
                        $sol = \App\Models\Solution::where('id',$id[0])->get();

                        array_push($solution,$sol);
                    }

                    $visual = array();

                    foreach ($solutions_with_votes as $key1=>$solution_expected){
                        foreach ($solution[0] as $key2 => $solution_filt){

                            if($solution_filt->title == $solution_expected->title){


                                $key = array_search($solution_filt->title, (array)$solutions_with_votes[$key1]);

                                if(false !== $key){
                                    unset($solutions_with_votes[$key1]);
                                }
                            }
                        }
                    }

                    $data = view('components.Elements.Tables.solutions-table')
                        ->with([
                            'issues' => $solutions_with_votes,
                            'table' => 'solutions-report-table'
                        ])
                        ->render();

                    return [$data];

                    break;
            }

            break;
    };


    return [$query->get()];
});
