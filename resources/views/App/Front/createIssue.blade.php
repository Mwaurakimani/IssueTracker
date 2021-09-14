@extends('layouts.front')

@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="createIssue-body">
        <form action="/Issues" method="POST" enctype="multipart/form-data">
            @csrf
            <H3>Submit Ticket</H3>
            <div class="form-group">
                <label for="Subject">Subject</label>
                <input type="text" class="form-control" id="Subject" placeholder="Subject" name="Subject">
                {{--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}

            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="Description" id="Description" ></textarea>
            </div>

            <hr>
            <div class="btn-group">
                <button type="submit" value="submit">Submit</button>
                <button type="reset"  value="reset">Cancel</button>
            </div>
        </form>
    </div>
@endsection
