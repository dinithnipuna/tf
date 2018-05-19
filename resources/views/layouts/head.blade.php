<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Feb 2018 18:00:26 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/js/jQueryUI/jquery-ui.css') }}">
    <link href="{{ asset('/bootstrap.3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome.4.6.1/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/cover.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/forms.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/buttons.css') }}" rel="stylesheet">
    @yield('style')
    <script src="{{ asset('/assets/js/jquery.1.11.1.min.js') }}"></script>
    <script src="{{ asset('/bootstrap.3.3.6/js/bootstrap.min.js') }}"></script>
    @yield('script')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>