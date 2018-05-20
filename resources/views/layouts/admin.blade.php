<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demos.bootdey.com/dayday/sidebar_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Feb 2018 18:02:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/img/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Teacher Finder | Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/bootstrap.3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome.4.6.1/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/cover.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/forms.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/sidebar_profile.css') }}" rel="stylesheet">
    <script src="{{ asset('/assets/js/jquery.1.11.1.min.js') }}"></script>
    <script src="{{ asset('/bootstrap.3.3.6/js/bootstrap.min.js') }}"></script>
    
    {{-- <script src="{{ asset('/assets/js/custom.js') }}"></script> --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-white navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><b>Admin Panel</b></a>
              <a class="btn-menu btn btn-azure btn-toggle-menu" href="#">
                <i class="fa fa-bars"></i>
              </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="actives"><a href="{{ route('profile',['id' => Auth::user()->id]) }}">Profile</a></li>
            <li><a href="/">Home</a></li>
            <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div id="wrapper" class="wrapper-content">

        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav nav-stacked"  style="margin-top:40px;">
                <li class="img-profile-content">
                  <img src="{{ asset('img/Friends/guy-3.jpg') }}" class="img-circle img-thumbnails">
                </li>
                <li class="{{ request()->is('admin') ? 'active' : '' }}">
                    <a href="/admin"><i class="fa fa-dashboard m-r-10"></i> Dashboard</a>
                </li>
                
                @role(['admin'])
                    <li class="{{ request()->is('institutes') ? 'active' : '' }}">
                        <a href="/institutes">
                            <i class="fa fa-university"></i> Institutes
                        </a>
                    </li>
                    <li>
                        <a href="/grades">
                            <i class="fa fa-bars"></i> Grades
                        </a>
                    </li>
                    <li>
                        <a href="/subjects">
                            <i class="fa fa-bars"></i> Subjects
                        </a>
                    </li>
                @endrole

                @role(['manager'])
                    <li class="{{ request()->is('teachers') ? 'active' : '' }}">
                        <a href="/teachers"><i class="fa fa-users"></i> Teachers</a>
                    </li>
                @endrole

                @role(['teacher'])
                    <li>
                        <a href="/classes"><i class="fa fa-bars"></i> Classes</a>
                    </li>
                    <li>
                        <a href="/students"><i class="fa fa-users"></i> Students</a>
                    </li>
                @endrole

                @role(['admin'])
                    <li>
                        <a href="/users">
                            <i class="fa fa-users"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="/roles">
                            <i class="fa fa-key"></i> Roles
                        </a>
                    </li>
                    <li>
                        <a href="/permissions">
                            <i class="fa fa-lock"></i> Permissions
                        </a>
                    </li>
                     <li>
                        <a href="/provinces"><i class="fa fa-bars"></i> Provinces</a>
                    </li>
                    <li>
                        <a href="/districts"><i class="fa fa-bars"></i> Districts</a>
                    </li>
                @endrole

            </ul>
        </div>

        <div id="page-content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('page_header')
            </section>

            @yield('content')

        </div>

        <footer class="footer">
              <div class="container">
                <p class="text-muted"> Copyright &copy; Company - All rights reserved </p>
              </div>
        </footer>

    </div>

  </body>

<!-- Mirrored from demos.bootdey.com/dayday/sidebar_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Feb 2018 18:02:02 GMT -->
</html>
