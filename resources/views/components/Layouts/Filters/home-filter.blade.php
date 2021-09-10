
<div class="main-list-view">
    @if(isset($solutions))
        @foreach($solutions as $solution)
            <div class="main-list-item">
                <a href="/home/Solutions/{{ $solution->id }}">
                    <img src="{{ asset('storage/Images/fold.png') }}" alt="">
                    <p>{{ $solution->title }}</p>
                </a>
            </div>
        @endforeach
    @else
    @endif
</div>
