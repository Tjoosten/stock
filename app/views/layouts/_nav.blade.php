<ul class="nav navbar-nav navbar-right">
    @if(!Auth::check())
    {{-- Not Logged in --}}
    <li>
        {{ link_to_action('SessionsController@create', 'Inloggen') }}
    </li>
    @else
    {{-- Logged in --}}
    {{-- <li><a href="#">Meldingen <span class="badge">42</span></a></li> --}}
    <li>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
            </li>
            <li>
                {{ link_to_action('CustomersController@index', 'Klanten') }}
            </li>
            <li>
                {{ link_to_action('SearchController@index', 'Zoeken') }}
            </li>

            <li class="divider"></li>
            <li>
                {{ link_to_action('SessionsController@destroy', 'Logout') }}
            </li>
        </ul>
    </li>
    @endif
</ul>