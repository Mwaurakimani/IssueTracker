@extends('layouts.app')

@php
    $solutions = \App\Models\Solution::all();
@endphp


@section('content')
    <div class="Users-view">
        <div class="back-end-action-bar">
            <div class="back-end-action-bar">
                <button onclick="window.location.href='/Solutions/dashboard'">Create</button>
            </div>
        </div>
        <div class="solutions-table">
            @if(isset($solutions))
                <table class="table table-sm border table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">User</th>
                        <th scope="col">Date Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($solutions as $solution)
                        <tr onclick="window.location.href='/Solutions/dashboard/{{ $solution->id }}'">
                            <th scope="col">{{ ($loop->index) + 1 }}</th>
                            <td>{{ $solution->title }}</td>
                            <td>{{  \App\Models\User::find($solution->user)->name }}</td>
                            <td>{{ $solution->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>
                    No record found!!
                </p>
            @endif
        </div>
    </div>

    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>
@endsection
