
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="{{asset('/bootadmin/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/bootadmin/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('/bootadmin/css/datatables.min.css')}}">
        <link rel="stylesheet" href="{{asset('/bootadmin/css/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{asset('/bootadmin/css/bootadmin.min.css')}}">
        @yield('pagecss')
        <title>
        @yield('pagetitle')            
        </title>
    </head>
    <body class="bg-light">

        <nav class="navbar navbar-expand navbar-dark bg-primary">
            <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
            <a class="navbar-brand" href="https://bootadmin.net">BootAdmin</a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li> --}}
                    @yield('topnav')
                    <li class="nav-item dropdown">
                        <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                            {{-- <a href="#" class="dropdown-item">Profile</a> --}}
                            @yield('usertopnav')
                            <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="d-flex">
            <div class="sidebar sidebar-dark bg-dark">
                <ul class="list-unstyled">
                    {{-- <li><a href="#"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li> --}}
                    @yield('pagemenu')
                    <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>

                </ul>
            </div>

            <div class="content p-4">
                
                    <h5 class="mb-4">
                        @yield('pagebreadcrumb')
                    </h5>

                    @yield('pagecontent')
            </div>
        </div>

    <script src="{{asset('/bootadmin/js/jquery.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/datatables.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/moment.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/bootadmin.min.js')}}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118868344-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118868344-1');
    </script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-4097235499795154",
        enable_page_level_ads: true
    });
    </script>
    @yield('pagejs')
    </body>
</html>