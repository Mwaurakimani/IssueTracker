@extends('layouts.app')

@section('content')
    <div class="Users-view">
        <div class="back-end-action-bar">
            <div class="sort-component">
                <form action="">
                    <label for="sort_elements">Sort By :</label>
                    <select class="form-control" name="sort_elements" id="sort_elements">
                        <option>Date Created</option>
                    </select>
                </form>
            </div>
{{--            <div class="paginator-1-component">--}}
{{--                <p>1-11 of 200</p>--}}
{{--                <div class="pagination-page-controller">--}}
{{--                    <button class="Prev"> &#60;</button>--}}
{{--                    <button class="Next"> &#62;</button>--}}
{{--                </div>--}}
{{--                <select class="formm-control" name="sort_elements" id="sort_elements">--}}
{{--                    <option>Page</option>--}}
{{--                </select>--}}
{{--            </div>--}}
        </div>
        <div class="Item-view-content user-form">
            <x-Forms.user-form :user="$user">

            </x-Forms.user-form>
        </div>
    </div>

    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>
    <script>
        function remove_message() {
            $('.my-allert').fadeOut('slow');
        }
    </script>
@endsection
