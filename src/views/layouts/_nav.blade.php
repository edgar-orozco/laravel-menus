@if (count($items) > 0)

        @foreach ($items as $item)
            @include('laravel-menus::layouts._menu_item', $item)
        @endforeach

@endif