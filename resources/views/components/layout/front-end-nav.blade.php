<nav id="front-end">
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/Solutions">Solutions</a>
        </li>
        <li>
            <a href="/Account">Account</a>
        </li>
        @if(Auth::check())
            @if(Auth::user()->title != 'Client')
                <li>
                    <a href="/Dashboard">Dashboard</a>
                </li>
            @endif
        @endif
    </ul>
</nav>
