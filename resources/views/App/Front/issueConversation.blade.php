@extends('layouts.front')

@section('content')

    <x-front-end-header>
    </x-front-end-header>

    <x-front-end-nav>
    </x-front-end-nav>
    <div class="home-body">
        <div class="home-content-body issue-chat-holder">
            <div class="conversation-panel">
                <div class="conversation-sect">
                    <p class="status">{{ $issue->Status->name }}</p>
                    <div class="issue-data">
                        <span>#{{ $issue->id }}</span>
                        <p>{{ $issue->subject }}</p>
                    </div>
                    <p class="description-sect">{{ $issue->description }}</p>
                    <div class="chat-section client">
                        <div class="user-details">

                            <div class="initials">
                                <p>M</p>
                            </div>
                            <div class="chat-data">
                                <p>{{ $issue->User->name }}</p>
                                <p>Time</p>
                            </div>
                        </div>

                        <div class="text-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At blanditiis cum cumque
                                deserunt dolore, dolorem harum in nostrum numquam omnis quo unde, voluptate! Aliquam
                                commodi doloribus illum ipsa minus soluta.
                            </p>
                        </div>
                    </div>
                    <div class="chat-section technician">
                        <div class="user-details">

                            <div class="initials">
                                <p>M</p>
                            </div>
                            <div class="chat-data">
                                <p>{{ $issue->Team->name  }}</p>
                                <p>Time</p>
                            </div>
                        </div>

                        <div class="text-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At blanditiis cum cumque
                                deserunt dolore, dolorem harum in nostrum numquam omnis quo unde, voluptate! Aliquam
                                commodi doloribus illum ipsa minus soluta.
                            </p>
                        </div>
                    </div>
                    <form class="entry-section" action="">
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                        <input type="file">
                        <button type="submit"> Send </button>
                    </form>
                </div>
                <div class="status-sect">
                    <h4>Ticket Status</h4>

                    <h6>Status</h6>
                    <p>{{ $issue->Status->name }}</p>
                </div>
            </div>
        </div>
    </div>


@endsection
