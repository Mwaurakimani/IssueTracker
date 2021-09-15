<div class="msg-card ">
    <div class="user-details">
        <div class="tag-elem admin-tag">
            {{ $message->User->name[0] }}
        </div>
        <div class="det-holder">
            <h4> {{ $message->User->name }}</h4>
            <p> {{ $message->created_at->diffForHumans() }} </p>
        </div>
    </div>
    <div class="message-holder admin-message"> {{ $message->message }} </div>
</div>
