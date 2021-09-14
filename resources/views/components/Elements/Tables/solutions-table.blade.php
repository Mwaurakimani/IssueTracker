
<table class="table table-sm border table-bordered {{$table}}">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Up-votes</th>
        <th scope="col">Down-votes</th>
        <th scope="col">Date Created</th>
    </tr>
    </thead>
    <tbody>

    @foreach($issues as $issue)
        <tr onclick="window.location.href='/Solutions/dashboard/1'">
            <th scope="col">{{ ($loop->index) + 1 }}</th>
            <td>{{ $issue->title }}</td>
            <td>
                @php
                    $count = DB::select(DB::raw("select SUM(vote) as count from votes WHERE solution_id = ".$issue->id." AND vote = 1 GROUP BY solution_id"));
                    if(count($count) > 0){
                        echo $count[0]->count;
                    }else{
                        echo 0;
                    }
                @endphp
            </td>
            <td>
                @php
                    $count = DB::select(DB::raw("select SUM(vote) as count from votes WHERE solution_id = ".$issue->id." AND vote = 0 GROUP BY solution_id"));
                    if(count($count) > 0){
                        echo $count[0]->count;
                    }else{
                        echo 0;
                    }
                @endphp
            </td>
            <td>{{ $issue->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
