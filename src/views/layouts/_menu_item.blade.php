@if( Auth::user() && count( array_intersect(array_pluck(Auth::user()->roles,'id'), array_pluck($item->roles, 'id') ) ) )
    @if(!$item->action)
        @if(count($item->children) && $item->menu_id)
            <li class="dropdown-submenu">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"> {{$item->name}} </a>
        @else
            <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"> {{$item->name}} <b class="caret"></b></a>
        @endif

    @else
        <li>
        <a href="{{$item->action}}">
            <i class="glyphicon {{$item->class}}"></i>&nbsp;
            {{$item->name}}
        </a>
    @endif
    @if (count($item['children']) > 0)
        <ul class="dropdown-menu" role="menu">
            @foreach($item['children'] as $item)
                @include('laravel-menus::layouts._menu_item', $items)
            @endforeach
        </ul>
    @endif

@endif
