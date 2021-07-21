@extends('layouts.front')

@section('content')

    <x-front-end-header>
    </x-front-end-header>

    <x-front-end-nav>
    </x-front-end-nav>
    <div class="home-body">
        <div class="home-content-body">
            <div class="main-list-panel">
                <h4>My Issues</h4>
                <div class="main-list-view issue-list">
                    <div class="issue-list-component">

                        @foreach($issues as $issue)
                            <a href="/{{ Auth::user()->id }}/MyIssues/{{ $issue->id }}">
                                <div class="img-sect">
                                    <img src="{{ asset("storage/Images/dashboard.png") }}" alt="">
                                </div>
                                <div class="body-sect">
                                    <h6>{{ $issue->subject }}</h6>
                                    <p>{{ $issue->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="btn-sect">
                                    <p>{{ $issue->Status->name }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
