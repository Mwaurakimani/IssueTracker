<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <h3
            style="height: 50px;
                        line-height: 50px;
                        font-size: 1.5em;
                        font-weight: 500;
                    ">
            @foreach($routes_array as $route)
                {{ Request::is($route->Name) ? $route->Name : ""}}
                {{ Request::is($route->Name."/*") ? $route->Name : ""}}
            @endforeach
        </h3>
    </div>
    <div class="nav-elem-search">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="account-management-nav">
        <div class="account-logo">
            <p id="account_action_control"> {{ Auth::user()->name[0] }}</p>
            <div class="account-action">
                <form action="/logout" method="POST">
                    @csrf
                    <button>Log Out</button>
                </form>
                <a href="/">Home</a>
            </div>
        </div>

    </div>
</nav>

