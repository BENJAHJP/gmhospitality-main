<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Grace Ministry</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- jquery script -->
</head>
<body>
    <div id="app">
        <div class="d-flex" id="wrapper" >

            <!-- Sidebar -->

                <div class="bg-white shadow-sm border-right" id="sidebar-wrapper" >
                    <div class="sidebar-heading" >Grace Ministries</div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-white">Dashboard</a>
                            <a href="{{ route('members.index') }}" class="list-group-item list-group-item-action bg-white">Members</a>
                            <a href="{{ route('mentors.index') }}" class="list-group-item list-group-item-action bg-white">Mentors</a>

                            @if (Auth::user()->role == '1')
                                <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action bg-white">Users</a>
                                <a href="{{ route('departments.index') }}" class="list-group-item list-group-item-action bg-white">Departments</a>
                            @endif

                        </div>
                    </div>
                
            
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm mr-auto">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('members.index')}}">
                            Members 
                        </a>  
                        <a class="navbar-brand" href="{{ route('mentors.index')}}">
                            Mentors 
                        </a>

                        @if(Auth::user()->role == '1')
                            <a class="navbar-brand" href="{{ route('admin.index')}}">
                                Users 
                            </a>

                            <a class="navbar-brand" href="{{ route('departments.index')}}">
                                Departments 
                            </a>
                        @endif

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                    <li class="nav-item dropdown">
                                        
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            </ul>
                        </div>
                    </div>
                </nav>
            <div class="container-fluid">
                
                <main class="py-4">
                    @yield('content')
                </main>

                <!-- Footer -->
                <footer class="page-footer font-small">

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2022 Copyright:
                <a> Grace Ministry </a>
                </div>
                <!-- Copyright -->

                </footer>
                <!-- Footer -->
            </div>
            </div>
                
            <!-- /#page-content-wrapper -->

            </div>
            <!-- /#wrapper -->
        </div>
    </div>
</body>
</html>
