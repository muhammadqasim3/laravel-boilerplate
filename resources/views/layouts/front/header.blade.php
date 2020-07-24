<?php $segment = Request::segments();?>
<div class="login_popup">
<div id="myModal2" class="modal fade in" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <div class="clearfix"></div>
      <div class="modal-body">
        <div class="loginPage">
          <div class="row">
            <form method="POST" class="loginForm" id="login" action="{{ route('login') }}">
			@csrf
			<div class="col-md-6 col-xs-12 col-sm-6 border-line">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				  <h2>Login</h2>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				  <label>Username or email address *</label>
				<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>
				@if ($errors->has('email'))
					  <span class="invalid-feedback" role="alert">
						<strong class="validate_css" >{{ $errors->first('email') }}</strong>
					  </span>
				@endif
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				  <label>Password *</label>
				<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
				  @if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
						  <strong class="validate_css">{{ $errors->first('password') }}</strong>
						</span>
				  @endif
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 text-center">
					<button class="btn btn1">Login</button>
					<input type="checkbox" name="vehicle1" value="Bike">Remember me<br>
				 </div>
            </div>
			</form>
            <form class="loginForm" id="signup" method="POST" action="{{ route('register') }}">
			@csrf
			  <div class="col-md-6 col-xs-12 col-sm-6">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				  <h2>Sign up</h2>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				  <label>Name *</label>
					<input type="text" class="form-control {{ $errors->registerForm->has('name') ? ' is-invalid' : '' }}" placeholder="First Name" name="name" id="name"required>
				   @if ($errors->registerForm->has('name'))
					<span class="invalid-feedback" role="alert">
					  <strong class="validate_css">{{ $errors->registerForm->registerForm->first('name') }}</strong>
					</span>
				   @endif
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				  <label>Email address *</label>
				  <input type="email" class="form-control {{ $errors->registerForm->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" id="signup-email" required>
					 @if ($errors->registerForm->has('email'))
					  <span class="invalid-feedback" role="alert">
						<strong class="validate_css">{{ $errors->registerForm->first('email') }}</strong>
					  </span>
					 @endif
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				  <label>Password *</label>
				  <input type="password" class="form-control {{ $errors->registerForm->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" id="signup-password" required>
					@if ($errors->registerForm->has('password'))
					  <span class="invalid-feedback" role="alert">
						<strong class="validate_css">{{ $errors->registerForm->first('password') }}</strong>
					  </span>
					 @endif
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				  <label>Password *</label>
					<input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation" id="signup-password" required>
				</div>
              <div class="col-md-12 col-xs-12 col-sm-12 text-center">
                <button class="btn btn1">Sign up</button>
              </div>
            </div>
			</form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-xs-12 col-sm-12 padd-0">
            <div class="sign_form">
              <ul>
                <li class="sign_fb"><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>log in with Facebook</a></li>
                <li class="sign_google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i>sign in Google</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<header id="header">
<div class="main-navigate">
  <div class="container">
    <div class="row">
      <div class="sidenav" id="mySidenav">
        <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">&times;</a>
      </div>
      <div class="mobilecontainer hidden-lg hidden-md">
        <a href="{{url('/')}}"><!--  <img src="images/logo.png" alt="" class="img-responsive pull-left"> --></a> <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">&#9776;</span>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12 padd-0">
        <div class="logo">
          <a href="{{url('/')}}"><img alt="" src="{{ asset($logo->img_path) }}"></a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 padd-right">
        <div class="navigation" id="navbar">
          <ul class="hidden-xs hidden-sm">
            <li>
              <a class="active" href="{{url('/')}}">Home</a>
            </li>
            <li>
              <a href="{{url('/about')}}">About me</a>
            </li>
            <li>
              <a href="{{url('/faqs')}}">Faq’s</a>
            </li>
            <li class="btn-group show-on-hover">
              <a href="{{url('/our-services')}}">our services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{url('/emdr-therapy')}}">EMDR
                  Therapy</a>
                </li>
                <li>
                  <a href="{{url('/cognitive-behavioural')}}">CBT Informed Interventions</a>
                </li>
              </ul>
            </li>
            <li class="btn-group show-on-hover">
              <a href="{{url('/resorce')}}">Resources<span class="caret"></span></a>
            </li>
            <li class="btn-group show-on-hover">
              <a href="{{url('/i-can-help-with')}}">i can help with<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{url('/i-can-help-with')}}#Trauma">Trauma</a></li>
                <li><a href="{{url('/i-can-help-with')}}#ANXIETY">Anxiety</a></li>
                <li><a href="{{url('/i-can-help-with')}}#OCD">OCD</a></li>
                <li><a href="{{url('/i-can-help-with')}}#Depression">Depression</a></li>
              </ul>
            </li>
            <!-- <li role="presentation" class="btn-group show-on-hover">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Problems<b class="caret"></b></a>
              <ul class="dropdown-menu multi-level">
                <li class="dropdown-submenu">
                  <ul class="dropdown-toggle">
                    <li class="dropdown-submenu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">i can help with</a>
                      <ul class="dropdown-menu">
                        <li><a href="i-can-help-with.html#Trauma">Trauma</a></li>
                        <li><a href="i-can-help-with.html#anxiety">Anxiety</a></li>
                        <li><a href="i-can-help-with.html#wanted">OCD</a></li>
                        <li><a href="i-can-help-with.html#depression">Depression</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12 padd-0">
        <div class="media">
          <div class="media-left"><img class="media-object" src="{{asset('images/phone.png')}}"></div>
          <div class="media-body">
            <h4 class="media-heading">Call Us Today!:</h4>
             <p><a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}">{{ App\Http\Traits\HelperTrait::returnFlag(59) }}</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
		<div class="free-btn">
		@if(Auth::check())
			<a href="{{url('account')}}" title="User Account"><i aria-hidden="true" class="fa fa-user" ></i></a>	  
			<a href="{{url('signout')}}" title="log Out"><i aria-hidden="true" class="fa fa-sign-out" ></i></a>
		@else
		  <a data-target="#myModal2" data-toggle="modal" href="#"><i aria-hidden="true" class="fa fa-user"></i> Log In</a>        
		@endif
		</div>
      </div>
		<div id="google_translate_element"></div>
    </div>
  </div>
</div>
</header>