@extends('layouts.main')
@section('content')
<?php $segment = Request::segments(); ?>
<section class="banner-sec">
  <img src="{{asset('images/banner-01.jpg')}}" alt="">
  <div class="banner-overlay">
    <div class="container">
      <div class="row">
        <h2 class="wow animated fadeInUp" data-wow-delay="0.2s">Update Resource</h2>
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
                                            <h3>{{ __('Update Resource') }}</h3>
                                            <div class="account-details-form">
											   <form action="{{ route('updateResource') }}" method="post" enctype="multipart/form-data">
												@csrf
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">{{ __('resoure name') }}</label>
                                                                <input type="text" id="resource-name" name="resource_name" value="{{$_getResource->resource_name}}" placeholder="Resoure Name">
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">{{ __('resoure description') }}</label>
                                                                <textarea name="description"><?php echo $_getResource->description ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item"> 
                                                                <img src="{{asset($_getResource->resource_img)}}" width="30%">
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">{{ __('resource image') }}</label>
                                                                <input type="file"  name="resource_img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
														<input type="hidden" name="resource_id" id="resource" value="{{ $_getResource->id }}">
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
	.panel {
    display: block !important;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
	$(document).on('click', ".btn1", function(e){
		// alert('it works');
		$('.loginForm').submit();
	});
</script>
@endsection