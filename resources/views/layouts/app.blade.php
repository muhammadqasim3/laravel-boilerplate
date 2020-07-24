<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php
	$favicon = DB::table('imagetable')
					->where('table_name', 'favicon')
					->first();
					
	?>	

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Mintone">
    <meta name="author" content="Admin Mintone">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset(!empty($favicon->img_path)?$favicon->img_path:'')}}">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- This page CSS -->
    @stack('before-css')
   
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .page-wrapper .container-fluid:first-child{
            padding-bottom: 60px;
        }

        @media screen and (max-width: 768px) {
            .page-wrapper .container-fluid:first-child{
                padding-bottom: 90px;
            }
        }
    </style>
    @stack('after-css')

</head>
			

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css')}} -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Admin {{ config('app.name') }}</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Container1140px -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    @include('layouts.admin.header')
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="container">
        @include('layouts.admin.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            @yield('content')
            @include('layouts.admin.footer')
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('plugins/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/vendors/jquery/spartan-multi-image-picker.min.js')}}"></script>

<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset('plugins/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('plugins/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('plugins/vendors/ps/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('assets/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('assets/js/custom.min.js')}}"></script>
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/edituser.js') }}"></script>
<!-- <script src="{{asset('plugins/vendors/switchery/dist/switchery.min.js')}}"></script>


<script src="{{asset('plugins/vendors/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('plugins/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script> -->

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor1' );
	CKEDITOR.replace( 'summary-ckeditor2' );
</script>


<script>
    $('#slimtest1, #slimtest2').perfectScrollbar();
	
	 $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
			
			
            @if(\Session::has('flash_message'))
            $.toast({
                heading: 'Info!',
                position: 'top-center',
                text: '{{session()->get('flash_message')}}',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3000,
                stack: 6
            });
            @endif
			
			
        })
	
</script>

<script type="text/javascript">
            $(document).ready(function() { $("#e1").select2(); });
</script>

<script type="text/javascript">
            $(document).ready(function() { $("#e2").select2(); });
</script>

<!-- ============================================================== -->
@stack('js')

</body>
</html>
