@extends('layouts.main')
@section('content')

    
    <div class="top-prog-sec top-prog-sec2 contact-sec">
   <section class="inpage featurePro">
  <div class="container">
    <div class="row">
		
	
	
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
        <div class="account_form">
          <div class="form_head">
            <h3> Register </h3>
            <p> If you have a registered account, you can login below. </p>
          </div>
          <form class="loginForm" method="POST" action="{{ route('register') }}">
		      @csrf
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Full name" required>
				  
				   @if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
				   @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>
      				   @if ($errors->has('email'))
      						<span class="invalid-feedback" role="alert">
      							<strong>{{ $errors->first('email') }}</strong>
      						</span>
      				   @endif
                </div>
              </div>
            </div>
			
			<div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
				
                 <!--  <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>--> 
				   
                </div>
              </div>
            </div>
			
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        				  @if ($errors->has('password'))
        						<span class="invalid-feedback" role="alert">
        							<strong>{{ $errors->first('password') }}</strong>
        						</span>
        				   @endif
				  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
              </div>
            </div>
			
            <div class="row logRow">
			
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  
			  <div class="log submit-btn"> <!--<a href="javascript:void(0)" class="btn btn1"> Register </a> --> <input type="submit" class="log submit-btn" value="Register" /> </div>
			 
			 </div>
			 
            </div>
			
			<hr/>
			
			
			    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <div class="customer">
                        <h5> Already have an account?</h5>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
                      <div class="request"> <a href="{{ route('signin') }}" class="btn btn1 "> Login </a></div>
                    </div>
                  </div>
			
			
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    
<!-- END: Checkout Section -->
    </div>
    <!-- product page end-->




@endsection
@section('css')
<style type="text/css">
	
	.account_form {
		margin: 70px 0px;
	}

	input.log.submit-btn {
		padding: 8px 30px;
		margin-right: 12px;
		background-image: -webkit-linear-gradient( 90deg, rgb(162,131,0) 0%, rgb(203,165,0) 100%);
		margin-bottom: 12px;
		float: left;
		border-radius: unset;
		border-color: unset;
		color: #fff;
		text-transform: none;
	}
</style>
@endsection
@section('js')
<script type="text/javascript">
	 $(document).on('click', ".btn1", function(e){
			$('.loginForm').submit();
	 });
</script>
@endsection
