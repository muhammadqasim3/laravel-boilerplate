@extends('layouts.app')

@push('before-css')
  <!-- This page CSS -->
  <!-- chartist CSS -->
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
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- Column -->
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title m-b-40 mt-3 align-self-center">Add new Product</h5>
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="relative">
                  <div id="amazingslider-wrapper-1" class="m-b-40">
                    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                      <ul class="amazingslider-slides" style="display:none;">
                        <li><a href="{{asset('assets/imgs/product-imgs/a-lightbox.jpg')}}" class="html5lightbox"><img src="{{asset('assets/imgs/product-imgs/a.jpg')}}" alt="" title="" /></a> </li>
                        <li><a href="{{asset('assets/imgs/product-imgs/4-lightbox.jpg')}}" class="html5lightbox"><img src="{{asset('assets/imgs/product-imgs/4.jpg')}}" alt="" title="" /></a> </li>
                        <li><a href="{{asset('assets/imgs/product-imgs/13-lightbox.jpg')}}" class="html5lightbox"><img src="{{asset('assets/imgs/product-imgs/13.jpg')}}" alt="" title="" /></a> </li>
                        <li><a href="{{asset('assets/imgs/product-imgs/19-lightbox.jpg')}}" class="html5lightbox"><img src="{{asset('assets/imgs/product-imgs/19.jpg')}}" alt="" title="" /></a> </li>
                      </ul>
                      <ul class="amazingslider-thumbnails" style="display:none;">
                        <li><img src="{{asset('assets/imgs/product-imgs/a-tn.jpg')}}" alt="" title="" /></li>
                        <li><img src="{{asset('assets/imgs/product-imgs/4-tn.jpg')}}" alt="" title="" /></li>
                        <li><img src="{{asset('assets/imgs/product-imgs/13-tn.jpg')}}" alt="" title="" /></li>
                        <li><img src="{{asset('assets/imgs/product-imgs/19-tn.jpg')}}"  alt="" title="" /></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="upload-photo">
                  <input type="file" id="input-file-now" class="dropify" />
                </div>
              </div>
              <!-- End of product slider -->
              <div class="col-lg-8 col-md-8">
                <div class="row">
                  <div class="form-wrap form-wrap2 mt-4">
                    <form class="form-horizontal" method="post">
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-group m-b-15">
                          <label class="control-label text-primary font-12 m-b-5">Product Name</label>
                          <div>
                            <input type="email" class="form-control font-14"  placeholder="Name">
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group m-b-15">
                        <div class="row m-0 m-b-20">
                          <div class="col-sm-6 col-xs-12">
                            <label class="control-label font-14 m-b-5">Select Category</label>
                            <div>
                              <select class="custom-select font-14 m-b-5" data-style="btn-default btn-outline">
                                <option  data-tokens="Category">Select Category </option>
                                <option data-tokens="Category 1">Category 1</option>
                                <option data-tokens="Category 2">Category 2</option>
                                <option data-tokens="Category 3">Category 3</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 col-xs-12">
                            <label class="control-label font-14 m-b-5">SKU identification</label>
                            <div >
                              <input type="text" class="form-control font-14"  placeholder="SKU">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group m-b-15">
                        <div class="row m-0 m-b-20">
                          <div class="col-md-3 col-xs-12">
                            <label class="control-label font-14 m-b-5">Unit Price</label>
                            <div>
                              <input type="text" class="form-control font-14 m-b-5"  placeholder="Unit Price">
                            </div>
                          </div>
                          <div class="col-md-6 col-xs-12 m-b-5">
                            <label class="control-label font-14 m-b-5 ">Currency</label>
                            <div >
                              <select class="custom-select" data-style="btn-default btn-outline">
                                <option  data-tokens="Category">Currency</option>
                                <option data-tokens="Category 4">USD</option>
                                <option data-tokens="Category 5">EURO</option>
                                <option data-tokens="Category 6">Bitcoin</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-12">
                            <label class="control-label m-b-5">Quantity</label>
                            <div>
                              <input type="text" class="form-control font-14 m-b-5"  placeholder="Quantity">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group m-b-15">
                        <div class="col-sm-12">
                          <label class="control-label m-b-5">Tags</label>
                          <div class="tags-default">
                            <input type="text" value="Product, Shop, Fashion, Coat" data-role="tagsinput">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row m-b-15">
                        <div class="col-sm-12">
                          <label class="col-12 p-t-0 m-b-5">Description</label>
                          <div class="col-12">
                            <textarea class="form-control textarea-lg"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row m-l-0 m-b-10">
                        <div class="col-md-6 col-xs-12 m-b-10">
                          <div class="p-l-15 p-r-15">
                            <input type="checkbox" checked class="js-switch" data-color="#4886ff" data-size="small">
                            <label class="m-l-10"> Available</label>
                          </div>
                        </div>
                        <div class="col-md-6  col-xs-12 text-right">
                          <div class="p-l-15 p-r-15">
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-success">Save</button>
                            <button type="button" class="btn btn-rounded waves-effect waves-light btn-outline-default">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     @include('layouts.admin.footer')
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
