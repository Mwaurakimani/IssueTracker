

<ul class="side_panel_holder">
    @foreach($routes_array as $route)
        <x-Elem.side-bar-action :routes="$route">

        </x-Elem.side-bar-action>
    @endforeach
</ul>
