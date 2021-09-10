@extends('layouts.front')
@php


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
            <form action="/home/search">
                <input type="search" placeholder="Search by Title" name="searchSolution">
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
                <x-Layouts.Filters.home-filter :solutions="$solutions">

                </x-Layouts.Filters.home-filter>
            </div>
        </div>
    </div>


@endsection
