<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>

        
    <nav class="u_navbar">
        <a class="logo" href="http://127.0.0.1:8000/">Unison</a>
                <div>
                    <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">

<i class="bi bi-door-open-fill"></i> 
{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="u_menu">
                <div class="sidebar-sticky">
                    <div class="u_menu-info">
                        <img src="{{URL::asset('/images/jumbo-2.png')}}">

                        <h4>{{auth()->user()->name}} {{auth()->user()->surname}}</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link u_menu-info-link {{request()->is('admin') ? 'menu-active' : ''}}" href="{{route('admin.home')}}">
                                <i class="bi bi-house-door"></i>
                                Main menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link u_menu-info-link {{request()->is('admin/users/*') ? 'menu-active' : ''}}" href="{{route('admin.users.show', auth()->user())}}">
                                <i class="bi bi-people"></i>
                                Il mio profilo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link u_menu-info-link {{request()->is('admin/messages') ? 'menu-active' : ''}}" href="{{route('admin.messages.index')}}">
                                <i class="bi bi-chat-dots"></i>
                                Messaggi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link u_menu-info-link {{request()->is('admin/reviews') ? 'menu-active' : ''}}" href="{{route('admin.reviews.index')}}">
                                <i class="bi bi-file-text"></i>
                                Recensioni
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="u_main">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
       function changeButton(e) {
           if(e.textContent == 'Read More') {
            e.textContent = 'Read Less'
           } else if(e.textContent == 'Read Less') {
            e.textContent = 'Read More'
           }
       }
        
    </script>
</body>

</html>
