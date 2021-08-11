
<form id="levels_form" action="" data-linker="{{ $linker }}">
    <div class="table-view">
        <div id="new" onclick="getItem(null,'{{ $linker }}')">Create New</div>
        @php
            @endphp

        @if(isset($data) && count($data) > 0)
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $subData)
                    <tr onclick="getItem({{ $subData->id }},'{{ $linker }}')">
                        <th scope="row">{{ ($loop->index) + 1 }}</th>
                        <td>{{ $subData->name }}</td>
                        <td> {{ $subData->description = (strlen($subData->description) > 20) ? substr($subData->description,0,17).'...' : $subData->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No records were found</p>
        @endif

    </div>
    <div class="form-view">

    </div>
</form>
