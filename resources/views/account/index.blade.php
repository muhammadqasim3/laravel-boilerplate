@extends('layouts.main')
@section('content')
<?php $segment = Request::segments(); ?>
<section class="banner-sec">
  <img src="{{asset('images/banner-01.jpg')}}" alt="">
  <div class="banner-overlay">
    <div class="container">
      <div class="row">
        <h2 class="wow animated fadeInUp" data-wow-delay="0.2s">User Dashboard</h2>
      </div>
    </div>
  </div>
</section>
<main class="my-cart">
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
                                    <div class="tab-pane fade show active" id="dashboad">
                                        <div class="myaccount-content">
                                            <h3>{{ __('Dashboard') }}</h3>
                                            <div class="welcome">
                                            </div>
                                            <h2 class="mb-0">Welcome {{Auth::user()->name}}</h2>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
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