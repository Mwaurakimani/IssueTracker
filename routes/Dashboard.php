<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Message;

Route::get('/Dashboard', function () {
    $title = Auth::user()->title;

    switch ($title) {
        case 'Admin':
        case 'Technician':
            //users
            $users = \App\Models\User::all();
            $users = count($users);

            //clients
            $clients = \App\Models\User::where('title', 'Client')->get();
            $clients = count($clients);

            //Admin
            $Admin = \App\Models\User::where('title', 'Admin')->get();
            $Admin = count($Admin);

            //Technician
            $Technicians = \App\Models\User::where('title', 'Technicians')->get();
            $Technicians = count($Technicians);

            $all_solutions = \App\Models\Solution::all();

            $positive_solutions = positive_solutions();
            $positive_solutions = number_format((count($positive_solutions)) / (count($all_solutions)) * 100, 0, '%', '');


            $negative_solutions = negative_solutions();
            $negative_solutions = number_format((count($negative_solutions)) / (count($all_solutions)) * 100, 0, '%', '');

            $average_voted = ($positive_solutions + $negative_solutions) / 2;

            $all_issues = \App\Models\Issue::withTrashed()->get();
            $all_issues = count($all_issues);

            $get_resolved = get_resolved();
            $get_resolved = count($get_resolved);

            $get_Unresolved = get_Unresolved();
            $get_Unresolved = count($get_Unresolved);

            $closed_issues = \App\Models\Issue::onlyTrashed()->get();
            $closed_issues = count($closed_issues);

            $top_five_Issues = \App\Models\Issue::all();


            return view('App.Back.dashboard')->with([
                'users' => $users,
                'clients' => $clients,
                'Admin' => $Admin,
                'Technicians' => $Technicians,
                'positive_solutions' => $positive_solutions,
                'negative_solutions' => $negative_solutions,
                'average_voted' => $average_voted,
                'all_issues' => $all_issues,
                'get_resolved' => $get_resolved,
                'get_Unresolved' => $get_Unresolved,
                'closed_issues' => $closed_issues,
                'top_five_Issues' => $top_five_Issues
            ]);

            break;
        default:
            return redirect('/');

            break;
    }

})->middleware(['auth'])->name('Dashboard');

function positive_solutions()
{
    //Up-voted
    $upvotes = DB::select(DB::raw("SELECT solution_id,id,SUM(vote) as votes FROM `votes` WHERE vote=1 group BY solution_id"));
    $downvotes = DB::select(DB::raw("SELECT solution_id,id,vote FROM `votes` WHERE vote=0"));


    $ids_value = array();

    foreach ($upvotes as $record) {
        $negative_instances = 0;
        foreach ($downvotes as $downvote) {
            if ($downvote->solution_id == $record->solution_id) {
                $negative_instances++;
            }
        }


        $indicator = intval($record->votes) - intval($negative_instances);

        if ($indicator > 0) {
            array_push($ids_value, [$record->solution_id, $negative_instances]);
        }
    }


    $solution = array();

    foreach ($ids_value as $id) {
        $sol = \App\Models\Solution::where('id', $id[0])->get();

        array_push($solution, $sol);
    }

    return $solution;
}

function negative_solutions()
{
    $solutions_with_votes = DB::select(DB::raw("SELECT * FROM solutions LEFT JOIN votes ON solutions.id = votes.solution_id where votes.id <> 'null' group BY solutions.id"));

    //Up-voted
    $upvotes = DB::select(DB::raw("SELECT solution_id,id,SUM(vote) as votes FROM `votes` WHERE vote=1 group BY solution_id"));
    $downvotes = DB::select(DB::raw("SELECT solution_id,id,vote FROM `votes` WHERE vote=0"));


    $ids_value = array();

    foreach ($upvotes as $record) {
        $negative_instances = 0;
        foreach ($downvotes as $downvote) {
            if ($downvote->solution_id == $record->solution_id) {
                $negative_instances++;
            }
        }


        $indicator = intval($record->votes) - intval($negative_instances);

        if ($indicator > 0) {
            array_push($ids_value, [$record->solution_id, $negative_instances]);
        }
    }


    $solution = array();

    foreach ($ids_value as $id) {
        $sol = \App\Models\Solution::where('id', $id[0])->get();

        array_push($solution, $sol);
    }

    $visual = array();

    foreach ($solutions_with_votes as $key1 => $solution_expected) {
        foreach ($solution[0] as $key2 => $solution_filt) {

            if ($solution_filt->title == $solution_expected->title) {


                $key = array_search($solution_filt->title, (array)$solutions_with_votes[$key1]);

                if (false !== $key) {
                    unset($solutions_with_votes[$key1]);
                }
            }
        }
    }

    return $solutions_with_votes;
}

function get_resolved()
{
    $status = \App\Models\Status::all();

    $id = null;

    foreach ($status as $Stat) {
        if ($Stat->name == 'Resolved') {
            $id = $Stat->id;
        }
    }

    $query = \App\Models\Issue::withTrashed()->where('status_id', $id)->get();

    return $query;

}

function get_Unresolved()
{
    $status = \App\Models\Status::all();

    $id = null;

    foreach ($status as $Stat) {
        if ($Stat->name == 'Unresolved') {
            $id = $Stat->id;
        }
    }

    $query = \App\Models\Issue::withTrashed()->where('status_id', $id)->get();

    return $query;

}
