@extends('layouts.app')

@section('content')
    <div class="Users-view">
        <div class="back-end-action-bar">
            @if(isset($solution))
                <button form="solutionsForm" type="submit">Update</button>
                <button onclick="window.location.href='/solution/delete/{{ $solution->id }}'">Delete</button>
            @else
                <button form="solutionsForm" type="submit">Create</button>
            @endif
        </div>
        @if(Session::has('message'))
            <div class="my-allert alert alert-primary" role="alert">
                <p>{{ Session::get('message') }}</p>
                <span onclick="remove_message()">X</span>
            </div>
        @endif
        <div class="solution_form">
            <div class="solution_display">
                <h4>Solution Details</h4>

                @if(isset($solution))
                    <form method="POST" action="/solution/update/{{ $solution->id }}" id="solutionsForm">
                        @else
                            <form method="POST" action="/solution/create/" id="solutionsForm">
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="Text" class="form-control" id="title" name="title"
                                           value="{{ isset($solution->title) ? $solution->title : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="details">Description</label>
                                    <textarea name="description"
                                              id="details">{{ isset($solution->Description)? $solution->Description : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="details">Comments</label>
                                    <div class="comment_section">

                                        @if(isset($comments))
                                            @forelse($comments as $comment)
                                                <x-Elements.comment-sect :comment="$comment">

                                                </x-Elements.comment-sect>
                                            @empty
                                            @endforelse
                                        @else
                                            <p>No comments found</p>
                                        @endif

                                    </div>
                                </div>
                            </form>
            </div>
            <div class="solution_details">

            </div>
        </div>
    </div>

    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            removePlugins: 'easyimage'
        });

        function remove_message() {
            $('.my-allert').fadeOut('slow');
        }

    </script>
@endsection
