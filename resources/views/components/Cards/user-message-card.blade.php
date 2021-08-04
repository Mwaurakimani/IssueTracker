<div class="msg-card ">
    <div class="user-details">
        <div class="tag-elem user-tag">
            {{ $issue->User->name[0] }}
        </div>
        <div class="det-holder">
            <h4> {{ $issue->User->name }}</h4>
            <p> {{ $message->created_at->diffForHumans() }} </p>
        </div>
    </div>
    <div class="message-holder user-message"> {{ $message->message }} </div>
</div>
