


<div class="header-tab">
    <h1>Organisation Name</h1>
    @if(Auth::check())
        <button form="logout-form" onclick="window.location.href='/logout'">LOG OUT</button>
    @else
        <form style="Display:none;" action="/login" id="logout-form">
        </form>
        <button form="logout-form" >LOG IN</button>
    @endif
</div>
