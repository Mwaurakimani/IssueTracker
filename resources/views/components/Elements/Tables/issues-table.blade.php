<table {{$attributes->merge(['class'=>$table])}}  class="table table-sm border table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Status</th>
        <th scope="col">User</th>
        <th scope="col">Date Created</th>
    </tr>
    </thead>
    <tbody>
    @foreach($issues as $issue)
        <tr onclick="window.location.href='/Issues/{{ $issue->id }}'">
            <th scope="col">{{ ($loop->index) + 1 }}</th>
            <td>{{ $issue->subject }}</td>
            <td>{{ $issue->Status->name }}</td>
            <td>{{ $issue->User->name }}</td>
            <td>{{ $issue->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
