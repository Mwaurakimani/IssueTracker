

<ul class="side_panel_holder">
    @foreach($routes_array as $route)
        <x-side-bar-action :routes="$route">

        </x-side-bar-action>
    @endforeach
</ul>
