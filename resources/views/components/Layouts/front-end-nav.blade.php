<nav id="front-end" >
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/Account">Account</a>
        </li>

        @if(Auth::check() && Auth::user()->title == 'Admin')
            <li>
                <a href="/Dashboard">Dashboard</a>
            </li>
        @endif
    </ul>
</nav>
