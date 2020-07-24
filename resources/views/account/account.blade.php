@extends('layouts.main')
@section('content')

<?php $segment = Request::segments(); ?>

<section class="banner-sec">
  <img src="{{asset('images/banner-01.jpg')}}" alt="">
  <div class="banner-overlay">
    <div class="container">
      <div class="row">
        <h2 class="wow animated fadeInUp" data-wow-delay="0.2s">Account Detail</h2>
      </div>
    </div>
  </div>
</section>
<!-- main content start -->

 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            @include('account.sidebar')
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                   <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade active" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>{{ __('Account Detail') }}</h3>
    
                                            <div class="account-details-form">
											   <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data" id="accountForm">
												@csrf
                                                    <div class="row">
													
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">{{ __('register name') }}</label>
                                                                <input type="text" id="last-name" name="name" placeholder="Last Name" value="<?php echo Auth::user()->name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">{{ __('Email') }}</label>
                                                        <input type="email" id="email" placeholder="Email Address" name="email" value="<?php echo Auth::user()->email; ?>">
                                                    </div>
    
                                                    <fieldset>
                                                        <legend>{{ __('Change Password') }}</legend>
    
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">{{ __('Password') }}</label>
                                                                    <input type="password" id="new-pwd" placeholder="{{ __('Password') }}" name="password">
                                                                </div>
                                                            </div>
    
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">{{ __('Confirm Password') }}</label>
                                                                    <input type="password" id="confirm-pwd" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
    
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn" id="updateProfile">{{ __('Save change') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
    
                                    
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


<!-- main content end -->	
</main>
@endsection
@section('css')
<style type="text/css">
	
</style>
@endsection
@section('js')

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
		$('#accountForm').submit();
  });

</script>


@endsection