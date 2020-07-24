@extends('layouts.app')

@push('before-css')
    <!-- This page CSS -->
    <!-- Page CSS -->
    <link href="{{asset('plugins/vendors/bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet"
          type="text/css">
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
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Orders</h5>
                        </div>
                        <div class="table-responsive m-t-10">
                            <table id="myTable"
                                   class="table table-orders color-table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox0" onchange="checkAll(this)" name="chk[]"
                                                   type="checkbox">
                                            <label for="checkbox0"></label>
                                        </div>
                                    </td>
                                    <td>ID</td>
                                    <td>Customer</td>
                                    <!-- <td>Delivery</td> -->
                                    <td>Status</td>
                                    <td>Date</td>
									
                                    <td class="op-0">&nbsp;</td>
									 
                                    <td class="op-0">&nbsp;</td>
                                </tr>
                                </thead>
                                <tbody>
									 @foreach($orders as $item)	
											<tr>
												<td>
													<div class="checkbox checkbox-primary">
														<input id="checkbox1" type="checkbox">
														<label for="checkbox1"></label>
													</div>
												 </td>	
												<td>{{ $item->id }}</td>
												<td class="text-dark weight-600">
													<a href="{{asset('ecommerce-order-page')}}">{{ $item->delivery_first_name.' '.$item->billing_last_name }}</a>
												</td>
												<!-- <td>Air Delivery</td> -->
												<td>{{ $item->order_status }}</td>
												<td>{{ $item->created_at }}</td>
												<td class="text-center">
												    
												<!--    <a title="View Invoice" data-toggle="tooltip" href="{{ url('/invoice/' . $item->id) }}" target="_blank">
												<i class="fas fa-file"></i></a> -->
												<a title="View Detail" data-toggle="tooltip" href="{{ url('admin/order/detail/' . $item->id) }}" target="_blank">
														<i class="fas fa-file"></i></a>
												
												</td>
												<td class="text-center"><a href=""><i
																class="fas fa-trash-alt text-danger"></i></a></td>
											</tr>
									@endforeach
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- chart box two -->
        <!-- ============================================================== -->
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
        $(function () {
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
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
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

