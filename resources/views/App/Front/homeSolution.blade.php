@extends('layouts.front')

@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="home-body" style="padding: 0">
        <div class="home-solution-display">
            <div class="title-display">
                <h4>Title :</h4>
                <p>{{ isset($solution->title) ? $solution->title : '' }}</p>
            </div>
            <div class="description-display">
                <h4>Description :</h4>
                <textarea name="description"
                          id="details">{!! isset($solution->Description)? $solution->Description : '' !!}</textarea>
            </div>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script defer="true">
        CKEDITOR.replace('description', {
            readOnly: true,
            resize_enabled : false,
            toolbar: []
        });
    </script>

@endsection
