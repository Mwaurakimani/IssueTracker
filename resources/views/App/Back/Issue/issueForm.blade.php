@extends('layouts.app')

@section('content')
    <div class="Issues-view">
        <div class="back-end-action-bar">
            <button>Close</button>
            <button onclick="window.location.href='/Issue/Delete/{{$issue->id}}'">Delete</button>
        </div>
        <div class="issue-display-admin">
            <div class="message-display-area">
                <div class="issue-newness">
                    <p>New</p>
                </div>
                <div class="message-display-scroll">
                    <div class="issue-display">
                        <div class="initial-section">
                            <p>M</p>
                        </div>
                        <div class="message-show-area">
                            <h4>{{ $issue->subject }}</h4>
                            <h6> {{ $issue->User->name }} </h6>
                            <h5> {{ $issue->created_at->diffForHumans()}} </h5>
                            <p> {{ $issue->description }} </p>
                        </div>
                    </div>
                    <div class="conversation-area">
                        @foreach($messages as $message)
                            @if($message->User->title == 'Client')
                                <x-Cards.user-message-card :issue="$issue" :message="$message">

                                </x-Cards.user-message-card>
                            @else
                                <x-Cards.admin-message-card :issue="$issue" :message="$message">

                                </x-Cards.admin-message-card>
                            @endif
                        @endforeach


                        <form action="" id="form_entry">
                            <div class="msg-card ">
                                <div class="user-details">
                                    <div class="tag-elem admin-tag">
                                        A
                                    </div>
                                    <div class="det-holder">
                                        <h4>Admin</h4>
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
                </div>
            </div>
            <div class="message-details-area">
                <div class="status-group">
                    <h6>Status</h6>
                    <div class="bind-collection">
                        <div class="icon-elem"></div>
                        <h4>Created at</h4>
                        <p>{{ $issue->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="bind-collection">
                        <div class="icon-elem"></div>
                        <h4>Modified at</h4>
                        <p>{{ $issue->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
                <form action="">
                    <h6>Properties</h6>
                    <div class="form-group">
                        <label for="">Team Member</label>
                        <select name="" id="">
                            <option value="1">Technical Team</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Priority</label>
                        <select name="" id="">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="" id="">
                            <option value="Low">Standard</option>
                            <option value="Medium">Specialized</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="" id="">
                            <option value="Low">Pending</option>
                            <option value="Medium">Received</option>
                            <option value="Medium">Solving</option>
                            <option value="Medium">Solved</option>
                        </select>
                    </div>

                    <button>Update</button>
                </form>
            </div>
            <div class="contact-details-area">
                <div class="contact-card">
                    <h5>Contact Details</h5>
                    <div class="user-display-details">
                        <div class="initial">
                            <p>M</p>
                        </div>
                        <p>Username</p>
                    </div>
                    <div class="email-details">
                        <h6>Email</h6>
                        <p>useremail</p>
                    </div>
                    <a href="">View more info</a>
                </div>
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
                    url: 'sendMessage',
                    data: {
                        'message_entry': message_entry,
                        'issue_id': issue_id
                    },
                    dataType: 'json',
                    success: function (data) {
                        let admin_message_card = `<div class="msg-card ">
                            <div class="user-details">
                                <div class="tag-elem user-tag">
                                    ${data.name[0]}
                                </div>
                                <div class="det-holder">
                                    <h4> ${data.name}</h4>
                                    <p> A moment Ago </p>
                                </div>
                            </div>
                            <div class="message-holder admin-message"> ${message_entry} </div>
                        </div>`

                        let elem = $('#form_entry').before(admin_message_card);
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

    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>
@endsection
