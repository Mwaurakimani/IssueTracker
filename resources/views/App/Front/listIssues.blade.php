@extends('layouts.front')

@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="home-body" style="padding: 0">
        <div class="list-issues-bar">

        </div>
        <div class="issues-list-body">
            <div class="panel-head">
                <h6>Open or Pending</h6>
                <div class="custom-paginator">

                </div>
            </div>
            <div class="issue-display">
                @foreach($issues as $issue)
                    <div class="issue-list-item" onclick="window.location.href='/home/Issues/{{ $issue->id }}'">
                        <div class="sect-1">
                            <div class="img-holder">
                                <img src="{{ asset('storage/Images/issue-show.png') }}" alt="">
                            </div>
                        </div>
                        <div class="sect-2">
                            <h4> {{ $issue->subject }}</h4>
                            <p>{{ $issue->created_at->diffForHumans() }}</p>
                        </div>
{{--                        <div class="sect-3">--}}
{{--                            <p> {{ $issue['Status']->name }}</p>--}}
{{--                        </div>--}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
