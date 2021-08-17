@extends('layouts.front')

@php
@endphp


@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="home-body" style="padding: 0">
        <div class="list-issues-bar">

        </div>
        <div class="issue-form-home-display">
            <div class="msg-body">
                <div class="banner-status">
                    {{ $issue->Status->name }}
                </div>
                <div class="id-panel">
                    <p>#{{ $issue->id." " }} </p>
                    <span>.</span>
                    <p>{{ $issue->subject }}</p>
                </div>
                <p> {{ $issue->description }}</p>
                @if(isset($messages))
                    @foreach($messages as $message)
                        @if($message->User->title == 'Client')
                            <x-Cards.user-message-card :issue="$issue" :message="$message">

                            </x-Cards.user-message-card>
                        @else
                            <x-Cards.admin-message-card :issue="$issue" :message="$message">

                            </x-Cards.admin-message-card>
                        @endif
                    @endforeach
                @endif
                <form action="" id="form_entry">
                    <div class="msg-card ">
                        <div class="user-details">
                            <div class="tag-elem admin-tag">
                                {{ Auth::user()->name[0] }}
                            </div>
                            <div class="det-holder">
                                <h4>{{ Auth::user()->name }}</h4>
                            </div>
                        </div>
                        <div class="textarea-holder">
                                    <textarea data-issueID="{{ $issue->id }}" name="message_entry" id="message_entry"
                                              cols="10" rows="3"></textarea>
                            <div class="form-action">
                                <button id="send_message">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="status-body">
                <h4>Ticket Status</h4>
                <h6>Status</h6>
                <p>{{ $issue->Status->name }}</p>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#send_message').on('click', () => {
            event.preventDefault();
            let message_entry = $('#message_entry').val();
            let issue_id = $('#message_entry').attr('data-issueID');

            if (typeof message_entry !== 'undefined' && message_entry) {
                $.ajax({
                    type: 'POST',
                    url: '/Issues/sendMessage',
                    data: {
                        'message_entry': message_entry,
                        'issue_id': issue_id
                    },
                    dataType: 'json',
                    success: function (data) {
                        let user_message_card = `<div class="msg-card ">
                            <div class="user-details">
                                <div class="tag-elem user-tag">
                                    ${data.name[0]}
                                </div>
                                <div class="det-holder">
                                    <h4> ${data.name}</h4>
                                    <p> A moment Ago </p>
                                </div>
                            </div>
                            <div class="message-holder user-message"> ${message_entry} </div>
                        </div>`

                        let elem = $('#form_entry').before(user_message_card);
                        $('#message_entry').val('');
                        let parent = $('.message-display-scroll');
                        parent.scrollTop(parent.prop('scrollHeight'));


                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            } else {
                alert('Message cannot be blank');
            }
        });
    </script>

@endsection
