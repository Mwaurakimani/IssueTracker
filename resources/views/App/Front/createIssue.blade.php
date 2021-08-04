@extends('layouts.front')

@section('content')
    <x-layout.front-end-header>
    </x-layout.front-end-header>

    <x-layout.front-end-nav>
    </x-layout.front-end-nav>

    <div class="createIssue-body">
        <form action="/Issues" method="POST" enctype="multipart/form-data">
            @csrf
            <H3>Submit Ticket</H3>
            <div class="form-group">
                <Elem.label for="Subject">Subject</Elem.label>
                <input type="text" class="form-control" id="Subject" placeholder="Subject" name="Subject">
                {{--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}

            </div>
            <div class="form-group">
                <Elem.label for="Description">Description</Elem.label>
                <textarea name="Description" id="Description" ></textarea>
            </div>
            <div class="form-group">
                <Elem.label for="file">Attach File</Elem.label>
                <input type="file" id="file" name="file">
            </div>
            <hr>
            <div class="btn-group">
                <button type="submit" value="submit">Submit</button>
                <button type="reset"  value="reset">Cancel</button>
            </div>
        </form>
    </div>


@endsection
