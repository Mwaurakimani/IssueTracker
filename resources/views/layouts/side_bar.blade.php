

<ul class="side_panel_holder">
    @foreach($routes_array as $route)
        <x-Layouts.side-bar-action :routes="$route">

        </x-Layouts.side-bar-action>
    @endforeach
</ul>
