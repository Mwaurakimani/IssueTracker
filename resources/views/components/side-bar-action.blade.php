@props(['routes'])

<li class="side_item {{ \Request::is($routes->Name) ? 'active-panel' : ""}}">
    <a href="/{{ $routes->Name }}">
        <img src="{{ asset("storage/Images/".$routes->Icon) }}" alt="">
        <p>{{ $routes->Name }}</p>
    </a>
</li>
