	@extends('layouts.app')

@push('before-css')
  <!-- This page CSS -->
  <!-- Page CSS -->
  <link href="{{asset('plugins/vendors/bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/pages/order-page.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Breadcrumbs box -->
    <!-- ============================================================== -->
    <!--
    <nav class="breadcrumb">
      <span class="breadcrumb-item text-dark">Ecommerce</span>
      <a class="breadcrumb-item text-dark" href="{{url('admin/order/list')}}">Orders</a>
      <a class="breadcrumb-item text-primary">Orders Page</a>
    </nav>
    -->
    <!-- ============================================================== -->
    <!-- End Breadcrumbs box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- Column -->
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">

              <div class="col-lg-8">
                <div class="order-status">
                    @if($order->order_status == "Pending")
                  <ul>
                    <li class="active-link">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <span>Pending</span></li>
					
                    <li class="non-active">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <button<span>Completed</span></li>
                  </ul>
				  @else
					  <ul>
                    <li class="non-active">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <span>Pending</span></li>
					
                    <li class="active-link">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <span>Completed</span></li>
                  </ul>
				  @endif
                </div>
              </div>

              <div class="col-lg-4">
                <div class="btn-group pull-right">
                  <div class="dropdown">
                    <button aria-expanded="false" data-toggle="dropdown" class="btn waves-effect waves-light btn-rounded btn-outline-primary dropdown-toggle m-t-10" type="button">Change Order Status <span class="caret"></span></button>
                    <ul role="menu" class="dropdown-menu"> 
                      <li><a href="javascript:void()"  onclick="window.location.href='{{ route('status.pending',[$order->id ]) }}'" class="">Pending</a></li>
                      <li><a href="javascript:void()"  onclick="window.location.href='{{ route('status.completed',[$order->id ]) }}'" class="">Completed</a></li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->

    <!--Delivery details -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- Column -->
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex m-b-10 no-block">
              <h5 class="card-title m-b-0 align-self-center text-uppercase">Order id  {{$order->id}}</h5>
              <div class="ml-auto">
                <ul class="list-inline m-t-5 text-muted text-uppercase lp-5 font-medium font-12">
                  <li> {{date('F d, Y',strtotime($order->created_at))}}</li>

                </ul>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table product-table color-table primary-table">
                <thead>
                <tr>
				
                  <th>ID </th>
                  <th>Product</th>
                 <th>&nbsp;</th>
                  <th>Language</th>
                  <th>Price</th>
                  <th>QTY</th>
                  <th>Total</th>

                </tr>
                </thead>
                <tbody>
			<?php $subtotal  = 0;?>
				@foreach($order_products as $order_product)	
						<?php $product = App\Product::where('id',$order_product->order_products_product_id)->first(); // Helper::returnRow("products_header","id = ".$order_product->order_products_product_id); ?>
					<tr>
					
					 <td>{{ $order_product->order_products_id }}</td>
					 <td> <img src="{{asset($product->image)}}" alt="" title=""> </td> 
					  <td class="text-dark weight-600">
					  {{$order_product->order_products_name}}
					  </td>
					  <td>{{$order_product->mat_language}}</td>
					  <td>{{$order_product->order_products_price}}</td>
					  <td>{{$order_product->order_products_qty}}</td>
					  <td>{{$order_product->order_products_subtotal}}</td>

					</tr>
				
			<?php $subtotal+= $order_product->order_products_qty * $order_product->order_products_price; ?>
				@endforeach
             

                <tr>
                  <td colspan="2" class="custom-product">&nbsp;</td>

                  <td colspan="3" class="text-muted custom-product">Subtotal Price:
                  </td>
                  <td class="custom-product">{{ $subtotal }}</td>

                </tr>

                <!--<tr>-->
                <!--  <td class="no-border" colspan="2">&nbsp;</td>-->

                <!--  <td colspan="3" class="text-muted no-border">Discount:-->
                <!--  </td>-->
                <!--  <td class="no-border">-${{$order->discount}}</td>-->

                <!--</tr>-->

                <tr>
                  <td class="no-border" colspan="2">&nbsp;</td>
                  <td colspan="3" class="text-muted no-border">Shippping:
                  </td>
                  <td class="no-border">{{$order->order_shipping}}</td>

                </tr>

                <tr>
                  <td class="no-border" colspan="2">&nbsp;</td>
                  <td colspan="3" class="text-dark no-border weight-600">Total Price:
                  </td>
                  <td class="no-border">{{$order->order_total}}</td>

                </tr>





                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-12">
        <!--  <div class="card">
          <div class="card-body">
            <h5 class="card-title m-b-5 align-self-center text-uppercase">Billing Details</h5>


            <div class="product-table text-dark no-border">
             <table class="table m-b-5 m-t-20 ">
                   <tbody>
                <tr>
                  <td  class="text-muted">Recipient: </td>
                  <td  class="text-color">{{$order->billing_first_name}} {{$order->billing_last_name}}</td>
                </tr> <tr>
                  <td class="text-muted">Phone: </td>
                  <td class="text-color">{{$order->billing_phone_no}} </td>
                </tr> <tr>
                  <td class="text-muted">Address: </td>
                  <td class="text-color">{{$order->billing_address_1}},{{$order->billing_country}} {{$order->billing_city}}, {{$order->billing_state}}</td>
                </tr>
                <tr>
                  <td class="text-muted">Post Code: </td>
                  <td class="text-color">{{$order->billing_zip_code}}</td>
                </tr>


                </tbody>
              </table>
            </div>


          </div>
        </div>  -->

        <div class="card">
          <div class="card-body">
            <h5 class="card-title m-b-5 align-self-center text-uppercase">Shipping Address</h5>


            <div class="product-table text-dark no-border">
              <table class="table m-b-5 m-t-20 ">
                <tbody>
                <tr>
                  <td  class="text-muted">Recipient: </td>
                  <td  class="text-color">{{$order->delivery_first_name}} {{$order->delivery_last_name}}</td>
                </tr> <tr>
                  <td class="text-muted">Phone: </td>
                  <td class="text-color">{{$order->delivery_phone_no}}</td>
                </tr>
				<tr>
                  <td class="text-muted">Address: </td>
                  <td class="text-color">{{$order->delivery_address_1}},{{$order->delivery_country}} {{$order->delivery_city}}, {{$order->delivery_state}}</td>
                </tr>



                </tbody>
              </table>
            </div>


          </div>
        </div>

      </div>
      <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End Delivery details -->

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
  <script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>
  <script>
      $(function() {
          $('#myTable').DataTable();
          var table = $('#example').DataTable({
              "columnDefs": [{
                  "visible": false,
                  "targets": 2
              }],
              "order": [
                  [2, 'asc']
              ],
              "displayLength": 18,
              "drawCallback": function(settings) {
                  var api = this.api();
                  var rows = api.rows({
                      page: 'current'
                  }).nodes();
                  var last = null;
                  api.column(2, {
                      page: 'current'
                  }).data().each(function(group, i) {
                      if (last !== group) {
                          $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                          last = group;
                      }
                  });
              }
          });
          // Order by the grouping
          $('#example tbody').on('click', 'tr.group', function() {
              var currentOrder = table.order()[0];
              if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                  table.order([2, 'desc']).draw();
              } else {
                  table.order([2, 'asc']).draw();
              }
          });

      });
      $('#example23').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
  </script>
  <script>
      function checkAll(ele) {
          var checkboxes = document.getElementsByTagName('input');
          if (ele.checked) {
              for (var i = 0; i < checkboxes.length; i++) {
                  if (checkboxes[i].type == 'checkbox') {
                      checkboxes[i].checked = true;
                  }
              }
          } else {
              for (var i = 0; i < checkboxes.length; i++) {
                  console.log(i)
                  if (checkboxes[i].type == 'checkbox') {
                      checkboxes[i].checked = false;
                  }
              }
          }
      }
  </script>

  <!-- ============================================================== -->
  <!-- Style switcher -->
  <!-- ============================================================== -->
  <script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush
