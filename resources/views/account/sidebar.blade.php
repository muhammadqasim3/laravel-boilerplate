<div class="col-lg-3 col-md-4">
	<div class="myaccount-tab-menu nav" role="tablist">
		<a href="{{ URL('account') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'account')  ? 'active' : '' ?>"><i class="fa fa-dashboard"></i>
			{{ __('dashboard') }}</a>
		<a href="{{ URL('resources-listing') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'resourcesListing')  ? 'active' : '' ?>"><i class="fa fa-cart-arrow-down"></i> {{ __('Resources Listing') }}</a>
		<a href="{{ URL('account-detail') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'account-detail')  ? 'active' : '' ?>"><i class="fa fa-user"></i> {{ __('account detail') }}</a>    
		<a href="{{ URL('signout') }}"><i class="fa fa-sign-out"></i> {{ __('logout') }}</a>
	</div>
</div>