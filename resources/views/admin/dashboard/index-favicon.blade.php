@extends('layouts.app')

@push('before-css')
   <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
  
  <!--c3 CSS -->
  <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
  <!--Toaster Popup message CSS -->
  <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
  <!-- Page CSS -->
  <link href="{{asset('plugins/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/vendors/product-slider/product-slider.css')}}">
  <link href="{{asset('plugins/vendors/bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('plugins/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">
  <!-- page css -->
  <link href="{{asset('assets/css/pages/file-upload.css')}}" rel="stylesheet">

@endpush

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid logo">
        <div class="row">
      <!-- Column -->
      <div class="col-lg-12 col-md-12">
    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('favicon_upload')}}">
    @csrf
        <div class="card">
          <div class="card-body">
            <h3>Favicon Management</h3>
           <div class="clearfix"></div>
			<hr>
			@if ($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
            <div class="row m-b-15">
            <div class="col-lg-4 col-md-4">
                <img alt="" class="img-responsive" id="input-preview" src="{{ isset($favicon)?asset($favicon->img_path):asset('images/upload.jpg') }}">
				<div class="upload-photo">
					<input type="file" name="image" id="input-file-now" class="dropify" />
				</div>
            </div>
			
			
            </div>
			
			 <div class="row m-b-15">
			 
			  <div class="col-lg-4 col-md-4 text-right">
				<button type="submit" class="btn btn-lg btn-success text-right">Update</button>
			 </div>
			 
			 </div>
			
        </div>
    </form>
      </div>
    </div>
       
    </div>
</div>
@endsection

@push('js')
  <!-- ============================================================== -->
  <!-- This page plugins -->
  <!-- ============================================================== -->
  <!--c3 JavaScript -->
  <script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
  <script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
  <!--jquery knob -->
  <script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
  <!--Sparkline JavaScript -->
  <script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
  <!--Morris JavaScript -->
  <script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
  <script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
  <!-- Popup message jquery -->
  <script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
  <!-- Tag input Jquery -->
  <script src="{{asset('plugins/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('plugins/vendors/switchery/dist/switchery.min.js')}}"></script>
  <script>
      $(function() {
          // Switchery
          var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
          $('.js-switch').each(function() {
              new Switchery($(this)[0], $(this).data());
          });

      });
  </script>
  <!-- product jquery -->
  <script src="{{asset('plugins/vendors/product-slider/product-slider.js')}}"></script>
  <script src="{{asset('plugins/vendors/product-slider/product-slider.init.js')}}"></script>
  <!-- jQuery file upload -->
  <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>
  <script>
      $(function() {
          // Basic
          $('.dropify').dropify();

          // Translated
          $('.dropify-fr').dropify({
              messages: {
                  default: 'Glissez-déposez un fichier ici ou cliquez',
                  replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                  remove: 'Supprimer',
                  error: 'Désolé, le fichier trop volumineux'
              }
          });

          // Used events
          var drEvent = $('#input-file-events').dropify();

          drEvent.on('dropify.beforeClear', function(event, element) {
              return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
          });

          drEvent.on('dropify.afterClear', function(event, element) {
              alert('File deleted');
          });

          drEvent.on('dropify.errors', function(event, element) {
              console.log('Has Errors');
          });

          var drDestroy = $('#input-file-to-destroy').dropify();
          drDestroy = drDestroy.data('dropify')
          $('#toggleDropify').on('click', function(e) {
              e.preventDefault();
              if (drDestroy.isDropified()) {
                  drDestroy.destroy();
              } else {
                  drDestroy.init();
              }
          })
      });
  </script>
  <!-- ============================================================== -->
  <!-- Style switcher -->
  <!-- ============================================================== -->
  <script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush
