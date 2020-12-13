<div class="navbar-fixed">
    <nav class="light-green white">
        <div class="container">
            <div class="nav-wrapper">

                <a href="{{ route('home') }}" class="brand-logo">
                    @if(isset($navbarsettings[0]) && $navbarsettings[0]['name'])
                    {{ $navbarsettings[0]['name'] }}
                    @else
                    Daary
                    @endif
                    <i class="material-icons left">location_city</i>
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>

                <ul class="right hide-on-med-and-down">
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Acceuil</a>
                    </li>

                    <li class="{{ Request::is('property*') ? 'active' : '' }}">
                        <a href="{{ route('property') }}">Propriétés</a>
                    </li>

                    <li class="{{ Request::is('agents*') ? 'active' : '' }}">
                        <a href="{{ route('agents') }}">Agents</a>
                    </li>

                    <li class="{{ Request::is('gallery') ? 'active' : '' }}">
                        <a href="{{ route('gallery') }}">Galleries</a>
                    </li>

                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">Contactez-nous</a>
                    </li>

                    @guest
                    <li><a href="{{ route('login') }}">Login<i style="transform: translateY(4px); margin-left: 3px; font-size: 20px" class="fas fa-sign-in-alt"></i></a></li>
                    <li><a href="{{ route('register') }}"><i class="fas fa-user-plus" style="font-size: 20px; transform : translateY(3px)"></i></a></li>
                    @else
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown-auth-frontend">
                            {{ ucfirst(Auth::user()->name) }}
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>

                    <ul id="dropdown-auth-frontend" class="dropdown-content">
                        <li>
                            @if(Auth::user()->role->id == 1)
                            <a href="{{ route('admin.dashboard') }}" class="light-green-text">
                                <i class="material-icons">person</i>Profile
                            </a>
                            @elseif(Auth::user()->role->id == 2)
                            <a href="{{ route('agent.dashboard') }}" class="light-green-text">
                                <i class="material-icons">person</i>Profile
                            </a>
                            @elseif(Auth::user()->role->id == 3)
                            <a href="{{ route('user.dashboard') }}" class="light-green-text">
                                <i class="material-icons">person</i>Profile
                            </a>
                            @endif
                        </li>
                        <li>
                            <a class="dropdownitem light-green-text" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="material-icons">power_settings_new</i>{{ __('Deconnecter') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ route('home') }}">Home</a>
        </li>

        <li class="{{ Request::is('property*') ? 'active' : '' }}">
            <a href="{{ route('property') }}">Properties</a>
        </li>

        <li class="{{ Request::is('agents*') ? 'active' : '' }}">
            <a href="{{ route('agents') }}">Agents</a>
        </li>

        <li class="{{ Request::is('gallery') ? 'active' : '' }}">
            <a href="{{ route('gallery') }}">Gallery</a>
        </li>

        <li class="{{ Request::is('blog*') ? 'active' : '' }}">
            <a href="{{ route('blog') }}">Blog</a>
        </li>

        <li class="{{ Request::is('contact') ? 'active' : '' }}">
            <a href="{{ route('contact') }}">Contact</a>
        </li>
    </ul>

</div>