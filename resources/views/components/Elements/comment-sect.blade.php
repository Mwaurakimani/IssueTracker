@php
use App\Models\User;
@endphp
<div class="comment-sec">
    <div class="user-section">
        <div class="user-icon">
            <p>{{ User::find($comment->user_id)->name[0] }}</p>
        </div>
    </div>
    <div class="user-comment">
        <label>{{ User::find($comment->user_id)->name }}</label>
        <p>
            {{ $comment->comment }}
        </p>
    </div>
    <div class="vote-stat">
        @php
        $vote_id = $comment->vote_id;

        $vote = \App\Models\Vote::find($vote_id)->vote;
        @endphp

        @if($vote == 1)
        <p class="upvote">Up-vote</p>
        @else
        <p class="downvote">Down-vote</p>
        @endif
    </div>
</div>
