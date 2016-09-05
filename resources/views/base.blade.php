<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link type="text/css" rel="stylesheet" href="{{asset('css/estilos.css')}}" />
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

        @yield('aditional-header-scripts')
        @yield('aditional-header-styles')

        <!-- Scripts -->
        <script>
        window.Laravel = <?php
            echo json_encode([
                'csrfToken' => csrf_token(),
            ]);
        ?>
        </script>        
    </head>
    <body>
        <nav id='main-nav' class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" > <!--href="@yield('brand_redirect')"> -->
                        @yield('brand')
                    </a>
                </div>

                @if(Auth::check() && Route::getCurrentRoute()->getPath() !== 'home')
                <!-- Menu de navegação -->
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="menu" onfocus="this.blur()" onclick="toggle()">
                        <span class="">Menu Principal</span>
                        <i id='menu-toggle' class="fa fa-bars toggle" aria-hidden="true"></i>
                    </a>
                    <a href="#">About</a>
                    <a href="#">Services</a>
                    <a href="#">Clients</a>
                    <a href="#">Contact</a>
                </div>
                @else
                
                @endif

                <!-- Right Side Of Navbar -->
                <ul id="auth" class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li class="dropdown">

                        @if(Auth::check())
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        @endif
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}" 
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--</div>-->
        </nav>        
        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
            @yield('header')
            @yield('content')
            @yield('footer')
        </div>
    </body>

    @yield('aditional-footer-scripts')
    @yield('aditional-footer-styles')    

    <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}" />
    <script type="text/javascript" href="{{asset('js/app.js')}}" ></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
            if ($('#mySidenav').length > 0) {
                $('#main').css("margin-left",'32px');                
            } else {
                $('#main').css("margin-left",'0px');                
            }         
        });
        
        
        var x = true;
        
        function toggle(){
            if (x) {
                openNav();
            } else {
                closeNav();
            }
            x = !x;
        }
        /* Set the width of the side navigation to 280px and the left margin of the page content to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.left = "0px";
            $('#menu-toggle').removeClass('fa-bars').addClass('fa-times');
            //document.getElementById("main").style.marginLeft = "280px";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.left = "-248px";
            $('#menu-toggle').removeClass('fa-times').addClass('fa-bars');
            //document.getElementById("main").style.marginLeft = "32px";
        }
    </script>
</html>
