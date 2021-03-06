<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        
        @guest
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

        @else
            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        
        @endguest

        @guest
            @else
                @if (Route::is('home'))
                    <form class="d-flex" method="get" action="{{route('home')}}">
                        @csrf
                        <div class="row" id="buscador">
                            <input class="form-control" type="search" placeholder="Buscar tareas" aria-label="Search" name="buscar_tarea" id="buscadorInput">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-4" type="submit" id="buscar" name="buscar">Buscar</button>
                        </div>
                        </form>
                
                @elseif (Route::is('proyectos'))
                <form class="d-flex" method="get" action="{{route('proyectos')}}">
                    @csrf
                    <div class="row" id="buscador">
                        <input class="form-control" type="search" placeholder="Buscar proyectos" aria-label="Search" name="buscar_proyecto" id="buscadorInputProeyctos">
                        <button class="btn btn-outline-success my-2 my-sm-0 col-4" type="submit" id="buscarProyecto" name="buscar">Buscar</button>
                    </div>
                    </form>
                @endif
            @endguest
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesi??n') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endif
                @else
                {{-- <button class="btn btn-primary" type="button" id="buttonAddTask">+</button> --}}
                
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        {{-- </div> --}}
    </div>
</nav>