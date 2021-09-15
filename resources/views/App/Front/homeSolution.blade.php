@extends('layouts.front')

@php
    $positive = $negative = 0;
    $votes = $solution->Vote;
    $votes_isset = false;
    if(isset($votes)){
        $votes_isset = true;

        foreach ($votes as $vote){
            if($vote->vote){
                $positive++;
            }else{
                $negative++;
            }
        }
            //if this user has voted
            $voteStat = null;
            if(Auth::check()){
                $vote = \Illuminate\Support\Facades\Auth::user()->vote;

                if(isset($votes) && count($vote) > 0){

                $voteStat = $vote[0]->vote;
                }
            }

    }



@endphp

@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

    <div class="system_modal">
        <div class="body_panel">
            <div class="comment-box">
                <h3>Comment:</h3>
                <textarea id="Comment">

                </textarea>
                <button onclick="post_comment(1)">Post</button>
                <button onclick="post_comment(0)">Cancel</button>
            </div>
        </div>
    </div>

    <div id="form-holder" class="home-body" style="padding: 0" data-id="{{ $solution->id }}">
        <div class="home-solution-display">
            <div class="title-display">
                <h4>{{ isset($solution->title) ? $solution->title : '' }}</h4>
            </div>
            <div class="description-display">
                <h4>Description :</h4>
                {{--                <textarea name="description" id="description">{!! isset($solution->Description)? $solution->Description : '' !!}</textarea>--}}
                <div name="description"
                     id="description">{!! isset($solution->Description)? $solution->Description : '' !!}</div>
            </div>
            @if($votes_isset)
                <p>Voting</p>
                <div class="voting-section">
                    <div id="upVote"
                         class="display-section " {{Auth::check() ? 'onclick=toggle_vote(1)' : 'onclick=Alert_log_in()'}}>
                        <div class="icon-display {{ $voteStat ? "upvote" : "default-color" }}">
                            <img src="{{ asset("storage/Images/vote-arrow.png") }}" alt="">
                        </div>

                        <p>{{ $positive }}</p>
                    </div>
                    <div id="downVote"
                         class="display-section " {{Auth::check() ? 'onclick=toggle_vote(0)' : 'onclick=Alert_log_in()'}}>
                        <div class="icon-display upside-down {{ !$voteStat ? "downvote" : "default-color" }}">
                            <img src="{{ asset("storage/Images/vote-arrow.png") }}" alt="">
                        </div>
                        <p> {{ $negative }}</p>
                    </div>

                    <script>
                        function Alert_log_in() {
                            alert("Please Log in to allow voting");
                        }
                    </script>
                </div>
            @endif
        </div>
    </div>
    <script src="{{asset('ckeditor/ckeditor.js')}}">

    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        function toggle_vote(vote) {
            //visual effects
            if (vote) {
                $('#upVote .icon-display').addClass('upvote');
                $('#upVote .icon-display').removeClass('default-color');
                $('#downVote .icon-display').removeClass('downvote');
                $('#downVote .icon-display').addClass('default-color');
            } else {
                $('#upVote .icon-display').addClass('default-color');
                $('#upVote .icon-display').removeClass('upvote');
                $('#downVote .icon-display').removeClass('default-color');
                $('#downVote .icon-display').addClass('downvote');
            }

            //get id
            let id = $('#form-holder').attr("data-id");

            //send upvote
            $.ajax({
                type: 'POST',
                url: '/solutionVoting',
                data: {
                    id: id,
                    vote: vote
                },
                dataType: 'json',
                success: function (data) {
                    let rest = data.data;

                    switch (rest) {
                        case 0:
                            toggle_modal("Voted");
                            break;
                        case 1:
                            alert("A similar vote already exist");
                            break;
                        case 2:
                            toggle_modal("Updated");
                            break;
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function request_feedback() {
        }

        //ui change
        function toggle_modal(data = null) {
            let elem = $('.system_modal');
            let opacity = $('.system_modal').css('opacity');


            if (opacity == 1) {
                elem.fadeOut('fast');
            } else {
                elem.fadeIn(200, () => {
                    elem.animate(
                        {opacity: '1'},
                        {duration: 200}
                    );
                });
            }

            if (data != null) {
                commenter = data;
            }
        }

        let commenter = null;

        function post_comment(data) {

            try {
                switch (data) {
                    case 1:

                        let comment = $('#Comment').val()
                        let solution_id = $('#form-holder').attr('data-id');

                        //send comment
                        $.ajax({
                            type: 'POST',
                            url: '/postComment',
                            data: {
                                id: solution_id,
                                comment: comment
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (comment != null && commenter != "undefined") {
                                    alert(commenter + " successfully")
                                }
                            },
                            error: function (data) {
                                console.log(data.responseJSON);
                            }
                        });
                        break;
                    case 2:
                        console.log("Cancelled");
                        break;
                }
            } catch (err) {
                console.log(err);
            } finally {
                toggle_modal();
                window.location.reload();
            }
        }
    </script>
@endsection
