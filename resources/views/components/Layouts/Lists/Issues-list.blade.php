<div class="issues-content-holder">

    @if(!empty($issues))
        @forelse($issues as $issue)
            <a href="/Issues/{{ $issue->id }}" class="ticket-list-item">
                <div class="letter-logo">
                    <p>{{ $issue->User->name[0] }}</p>
                </div>
                <div class="display-details">
                    <p class="new-badge-display">New</p>
                    <p class="title">{{ $issue->subject }}</p>
                    <div class="summary-details">
                        <span>{{ $issue->User->name }}</span>
                        <span>.</span>
                        <span>{{ $issue->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="sub-details">
                    <div class="content-group">
                        <p>Priority</p>
                        <p style="color: orange">: {{ $issue['Priority']->name }}</p>
                    </div>
                    <div class="content-group">
                        <p>Level</p>
                        <p style="color: green">: {{ $issue['Level']->name }}</p>
                    </div>
                    <div class="content-group">
                        <p>Status</p>
                        <p style="color: grey">: {{ $issue['Status']->name }}</p>
                    </div>
                </div>
            </a>
        @empty

        @endforelse
    @else
        <p>No Issues Found</p>
    @endif

</div>
