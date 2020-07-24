@extends('layouts.main')
@section('content')

<section class="banner-sec">
  <img src="{{ asset('images/banner-01.jpg') }}" alt="">
  <div class="banner-overlay">
    <div class="container">
      <div class="row">
        <h2 class="wow  fadeInUp  animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Login / Sign Up</h2>
      </div>
    </div>
  </div>
</section>
    <section class="register-sec">
      <div class="container">
        <div class="row">
          <div class="modal-content">
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
                      <button class="btn btn1 pull-left">Login</button>
                      <label for="" class="rem pull-left">
                        <input type="checkbox" name="vehicle1" value="Bike" class="">Remember me<br>
                      </label>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 text-center">
                      <a href="{{ url('password/reset') }}" class="lost pull-left">Lost your password?</a>
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
                      <button class="btn btn1 pull-left">Sign up</button>
                       
                    </div>
                  </div>
              </form>

                </div>
              </div>
			  <!--
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
			  -->
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- <section class="accountsec inpage">
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <form method="POST" class="loginForm" id="login" action="{{ route('login') }}">
          @csrf
      <div class="login">
        <h3 class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">Login to Your Account</h3>
        <div class="form-group">
            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong class="validate_css" >{{ $errors->first('email') }}</strong>
                  </span>
            @endif
        </div>
         <div class="form-group">
            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
              @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong class="validate_css">{{ $errors->first('password') }}</strong>
                    </span>
              @endif
        </div>
        <div class="loginbtn">
          <button type="submit">login</button>
        </div>
        <div class="chkbx">
          <label for=""><input type="checkbox"> Remember me</label>
          <span class="pull-right"><a href="{{ url('password/reset') }}">Forget Password?</a></span>
        </div>
      </div>
    </form>
    </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="loginForm" id="signup" method="POST" action="{{ route('register') }}">
    @csrf
      <div class="login">
        <h3 class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">Register your Account</h3>

        <div class="form-group">
            <input type="text" class="form-control {{ $errors->registerForm->has('name') ? ' is-invalid' : '' }}" placeholder="First Name" name="name" id="name"required>
               @if ($errors->registerForm->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong class="validate_css">{{ $errors->registerForm->registerForm->first('name') }}</strong>
                </span>
               @endif
        </div>
        <div class="form-group">
          <input type="email" class="form-control {{ $errors->registerForm->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" id="signup-email" required>
             @if ($errors->registerForm->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong class="validate_css">{{ $errors->registerForm->first('email') }}</strong>
              </span>
             @endif
        </div>
         <div class="form-group">
          <input type="password" class="form-control {{ $errors->registerForm->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" id="signup-password" required>
                @if ($errors->registerForm->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong class="validate_css">{{ $errors->registerForm->first('password') }}</strong>
                  </span>
                 @endif
        </div>
          <div class="form-group">
          <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation" id="signup-password" required>
        </div>
     
        <div class="chkbx">
       <p>By creating an account, You agree to our <a href="">Term & Conditions</a> </p>
          
        </div>
           <div class="loginbtn">
          <button type="submit">CREATE ACCOUNT</button>
        </div>
      </div>
      </form>
    </div>

  </div>
</div>

 </section> -->
	
@endsection
@section('css')
<style type="text/css">
.input_icon_button button {
    border: 0;
    padding: 16px 0;
    background-color: #163a57;
    color: #fff;
    display: block;
    text-align: center;
    border-radius: 50px;
    font-size: 18px;
    width: 100%;
}

.loginPage .form-control {
    color: #000;
}
.modal-content {
    margin: 40px 0px 40px 0px;
}
</style>
@endsection
@section('js')

<script>
    $("#dob").datepicker({
        dateFormat: 'yy-m-d',
        SetDate: $('#user_profile_dob').val(),
        widgetPositioning: {
            vertical: 'bottom'
        },
        keepOpen: false,
        useCurrent: false,
        maxDate: moment().add(1, 'h').toDate()
    });
</script>

@endsection
