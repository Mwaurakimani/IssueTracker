
<table {{$attributes->merge(['class'=>$table])}}  class="table table-sm border table-bordered">
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
            <td>{{ $issue->subject }}</td>
            <td>{{ 200 }}</td>
            <td>{{ 300 }}</td>
            <td>{{ $issue->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
