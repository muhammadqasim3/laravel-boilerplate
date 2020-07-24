@extends('layouts.main')
@section('content')
<?php $segment = Request::segments(); ?>
<section class="banner-sec">
  <img src="{{asset('images/banner-01.jpg')}}" alt="">
  <div class="banner-overlay">
    <div class="container">
      <div class="row">
        <h2 class="wow animated fadeInUp" data-wow-delay="0.2s">Resources Listing</h2>
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
                                    <div class="tab-pane fade show active" id="orders" role="#">
                                        <div class="myaccount-content">
                                            <h3>{{ __('Resources Listing') }} <span class="align-right"><a href="{{ URL('create-resource') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'resourcesListing')  ? 'active' : '' ?>"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add Resources') }}</a><span></h3>
											<div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>{{ __('ID') }}</th>
															<th>{{ __('Image') }}</th>
                                                            <th>{{ __('Resource Name') }}</th>
                                                            <th>{{ __('Description') }}</th>
                                                            <th>{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
													@if($_getResources)
														@foreach($_getResources as $_getResource)
															<tr>
																<td>{{ $_getResource->id }}</td>
																<td><img src="{{asset($_getResource->resource_img)}}"></td>
																<td>{{ $_getResource->resource_name }}</td>
																<td><?php echo str_limit($_getResource->description, 50)  ?></td>
																<td class="viewbtn"><a href="{{ route('editResource',[$_getResource->id]) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="{{ route('deleteResource',[$_getResource->id]) }}" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td> 
															</tr>
														@endforeach
													@endif
                                                    </tbody>
                                                </table>
                                            </div>
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
.panel {
    display: block !important;
}
.align-right a {
    float: right;
    background-color: #86bc41;
    padding: 0px 8px 1px 8px;
    border-radius: 16px;
    font-size: smaller;
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