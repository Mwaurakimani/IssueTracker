@extends('layouts.front')

@php
$user = Auth::user();
@endphp

@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="Users-view">
        @if(Session::has('message'))
            <div class="my-allert alert alert-primary" role="alert">
                <p>{{ Session::get('message') }}</p>
                <span onclick="remove_message()">X</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="Item-view-content user-form Account-body">
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
