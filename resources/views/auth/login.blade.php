<!DOCTYPE html>
<html lang="en">
	
<!-- Ruwan Samarasinghe / Teacher-finderT -->
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Teacher Finder | A Education Social Network Website</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	</head>
	<body>

    <!-- Header
    ================================================= -->
		<header id="header-inverse">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <!-- span><img src="images/down-arrow.png" alt="" /></span --></a>
                 
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Features <!-- span><img src="images/down-arrow.png" alt="" /></span --></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="">Note Book</a></li>
                    <li><a href="">Timeline</a></li>
                    <li><a href="">My Teachers</a></li>
                    <li><a href="">Messenger</a></li>
                    <li><a href="">Forum</a></li>
                    <li><a href="">Tute library</a></li>
					<li><a href="">Student Calendar</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings</a>
                <ul class="dropdown-menu login">
                  
                  <li><a href="">Account Settings</a></li>
                  <li><a href="">Change Password</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
                
              </li>
              <li class="dropdown"><a href="contact.html">Contact</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            
            

            <div class="intro-texts">

            	<h1 class="text-white">Find Your Teacher !!!</h1>
            	<p>Friend Teacher is a Educational network Service that can be used to connect students and teachers. This service offers Student srive, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? join us now.</p>
              <button class="btn btn-primary">Learn More</button>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li><a href="/register">Register</a></li>
                  <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane" id="register">
                  <h3>Register Now !!!</h3>
                  <p class="text-muted">Be cool and join today. Meet millions</p>
                  
                  <!--Register Form-->
                  <form name="registration_form" id="registration_form" class="form-inline" action="{{ route('signup') }}" method="POST">
                  {{ csrf_field() }}
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="name" class="sr-only">Your Name</label>
                        <input id="name" class="form-control input-group-lg" type="text" name="signup_name" title="Enter your name" placeholder="Your name"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="signup_email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" class="form-control input-group-lg" type="password" name="signup_password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>

					<!-- -->
					<p><a href="#login" data-toggle="tab">Already have an account?</a></p>
					<input type="submit" class="btn btn-primary" value="Register Now" name="register"></input>
					<!-- -->
                  </form><!--Register Now Form Ends-->
				  <!--
                  <p><a href="#">Already have an account?</a></p>
                  <button class="btn btn-primary">Register Now</button>
				  -->
                </div><!--Registration Form Contents Ends-->
                
                <!--Login-->
                <div class="tab-pane active" id="login">
                    
                    @if(Session::has('success'))
                      <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if(Session::has('error'))
                      <div class="alert alert-success" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @if($errors->count())
                      <div class="alert alert-danger" role="alert">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif

                  <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>
                  
                  <!--Login Form-->
                  <form name="Login_form" id="Login_form" method="POST" action="{{ url('/login') }}">
                  {{ csrf_field() }}
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="email" name="email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                    
                    <div class="row">
                    <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- -->
					<p><a href="#">Forgot Password?</a></p>
					<input type="submit" class="btn btn-primary" value="Login Now" name="login"></button>
					<!-- -->
                  </form><!--Login Form Ends--> 
				  <!--
                  <p><a href="#">Forgot Password?</a></p>
                  <button class="btn btn-primary">Login Now</button>
				  -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          
            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
		<!-- footer -->
		<div class="row" style="width: 100%;">
			<p style="padding-left: 48px;"> copyright </p>
		</div>
      </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
   
    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.min.js"></script>
	<script src="js/jquery.incremental-counter.js"></script>
    <script src="js/script.js"></script>
	<script src="plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- page script -->
<script>
function init_Page(){
    $('.datepicker').datepicker(
        {
            format: 'yyyy-mm-dd'
        }
    );
}
</script>

<script>
$(function () {
    init_Page();
});
</script>
    
	</body>

<!-- Ruwan Samarasinghe / Teacher-finderT -->
</html>
