@extends('layouts.front')
@php
    $solutions = \App\Models\Solution::all();

@endphp
@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="home-body">
        <div class="home-content-body">
            @auth
                <h3>Welcome {{ Auth::user()->name }}</h3>
            @endauth
            <h3>How can we help you today?</h3>
            <form action="">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="reroute-pack">
                <a href="/Issues/create">

                    <img src="{{ asset('storage/Images/plus-icon.png') }}" alt="">
                    <span>New Support Ticket</span>
                </a>
                <a href="/home/Issues">

                    <img src="{{ asset('storage/Images/plus-icon.png') }}" alt="">
                    <span>Check Ticket Status</span>
                </a>
            </div>
            <div class="main-list-panel">
                <h4>Knowledge Base</h4>
                <div class="main-list-view">
                    @if(isset($solutions))
                        @foreach($solutions as $solution)
                            <div class="main-list-item">
                                <a href="/home/Solutions/{{ $solution->id }}">
                                    <img src="{{ asset('storage/Images/fold.png') }}" alt="">
                                    <p>{{ $solution->title }}</p>
                                </a>
                            </div>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
