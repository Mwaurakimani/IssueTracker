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
                $voteStat = $vote[0]->vote;
            }

    }



@endphp

@section('content')
    <x-Layouts.front-end-header>
    </x-Layouts.front-end-header>

    <x-Layouts.front-end-nav>
    </x-Layouts.front-end-nav>

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
                <p>Hellow</p>
                <div class="voting-section">
                    <div id="upVote" class="display-section " {{Auth::check() ? 'onclick=toggle_vote(1)' : 'onclick=Alert_log_in()'}}>
                        <div class="icon-display {{ $voteStat ? "upvote" : "default-color" }}">
                            <img src="{{ asset("storage/Images/vote-arrow.png") }}" alt="">
                        </div>

                        <p>{{ $positive }}</p>
                    </div>
                    <div id="downVote" class="display-section " {{Auth::check() ? 'onclick=toggle_vote(0)' : 'onclick=Alert_log_in()'}}>
                        <div class="icon-display upside-down {{ !$voteStat ? "downvote" : "default-color" }}">
                            <img src="{{ asset("storage/Images/vote-arrow.png") }}" alt="">
                        </div>
                        <p> {{ $negative }}</p>
                    </div>

                <script>
                    function Alert_log_in(){
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
        CKEDITOR.editorConfig = function (config) {
            config.toolbar = false
        }
        // CKEDITOR.replace('description', {
        //
        // });

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

                    console.log(rest)

                    switch (rest) {
                        case 0:
                            alert("Voted successfully");
                            break;
                        case 1:
                            alert("A similar vote already exist");
                            break;
                        case 2:
                            alert("Updated successfully");
                            break;
                    }

                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });

        }
    </script>
@endsection
