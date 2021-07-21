@extends('layouts.app')

@section('content')
    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>

    <div class="Issue-bar">
        <div class="action-bar">
            <a href="">Close</a>
            <button>Reply</button>
            <button>Escalate</button>
            <button>Delete</button>
        </div>
        <div class="ticket-body">
            <div class="conversation-text">

            </div>
            <div class="chat-text">

            </div>
            <div class="contact-user">
                <div class="holder">
                    <h6>Contact Details</h6>
                    <h4>M</h4>
                    <p>Username</p>
                    <div class="sub">
                        <h4>Email</h4>
                        <p>kimmwaus@mail.com</p>
                    </div>
                    <a href="">view more details</a>
                </div>
            </div>
        </div>
    </div>



@endsection
