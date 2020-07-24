@extends('layouts.app')

@push('before-css')
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>

    <!-- Date picker plugins css -->
    <link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- page css -->
    <link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex pt-3 pb-2 no-block">
                            <div class="align-self-center mr-3"><img src="{{asset('assets/imgs/icon/note.svg')}}" alt="" title="" width="55"></div>
                            <div class="align-slef-center mr-auto">
                                <h2 class="m-b-0 text-uppercase font-18 font-medium lp-5">458</h2>
                                <h6 class="text-light m-b-0">Daily orders</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex pt-3 pb-2 no-block">
                            <div class="align-self-center mr-3"><img src="{{asset('assets/imgs/icon/badge.svg')}}" alt="" title="" width="55"></div>
                            <div class="align-slef-center mr-auto">
                                <h2 class="m-b-0 text-uppercase font-18 font-medium lp-5">$1 756</h2>
                                <h6 class="text-light m-b-0">Daily sales</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex pt-3 pb-2 no-block">
                            <div class="align-self-center mr-3"><img src="{{asset('assets/imgs/icon/users.svg')}}" alt="" title="" width="55"> </div>
                            <div class="align-slef-center mr-auto">
                                <h2 class="m-b-0 text-uppercase font-18 font-medium lp-5">21 067</h2>
                                <h6 class="text-light m-b-0">Total users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- chart box one -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center text-uppercase">activity</h5>
                            <div class="ml-auto text-light-blue">


                                <ul class="nav nav-tabs customtab default-customtab list-inline m-b-30 text-uppercase lp-5 font-medium font-12"  role="tablist">
                                    <li><a class="nav-link active" data-toggle="tab" href="#last-year" role="tab">Last year</a></li>
                                    <li><a class="nav-link" data-toggle="tab" href="#last-month" role="tab">Last month</a></li>
                                    <li><a class="nav-link" data-toggle="tab" href="#last-week" role="tab">Last week</a></li>
                                    <li>
                                        <div class="pos-relative">
                                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <i class="flaticon-calendar"></i></a>

                                            <div class="dropdown-menu">

                                                <div id="datepicker-inline"></div>
                                            </div>
                                        </div>


                                        </span>


                                    </li>


                                </ul>
                            </div>
                        </div>
                        <ul class="list-inline m-b-30 text-uppercase lp-5 font-medium font-12">
                            <li><i class="fa fa-square m-r-5 text-warning"></i> Sales</li>
                            <li><i class="fa fa-square m-r-5 text-pink"></i> Orders</li>
                            <li><i class="fa fa-square m-r-5 text-primary"></i> New visitors </li>
                        </ul>


                        <div class="tab-content">
                            <div class="tab-pane active show" id="last-year" role="tabpanel">
                                <div id="extra-area-chart-2"></div>
                            </div>

                            <div class="tab-pane" id="last-month" role="tabpanel">
                                <div id="extra-area-chart-last-month"></div>
                            </div>


                            <div class="tab-pane" id="last-week" role="tabpanel">
                                <div id="extra-area-chart-last-week"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-6 col-md-6">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Popular categories</h5>
                            <div class="ml-auto text-light-blue"> <a href="#" class="pull-left text-light-blue inline-block refresh mr-15"> <i class="fas fa-sync"></i> Update </a> </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table color-table m-b-0">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Delivery type</th>
                                    <th>QTV</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Alice Brodwain</td>
                                    <td>American Express</td>
                                    <td>15</td>
                                    <td>$85</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Top product sales</h5>
                            <div class="ml-auto text-light-blue"> <a href="#" class="pull-left text-light-blue inline-block refresh mr-15"> <i class="fas fa-sync"></i> Update </a> </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table color-table">
                                <tbody>
                                <tr>
                                    <td><img src="{{asset('assets/imgs/pro.jpg')}}" alt="" title=""></td>
                                    <td>Notebook Asus Aspire <br>
                                        $375</td>
                                    <td>$9 375 <br>
                                        25 sales</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/imgs/pro2.jpg')}}" alt="" title=""></td>
                                    <td>Notebook Asus Aspire <br>
                                        $375</td>
                                    <td>$9 375 <br>
                                        25 sales</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/imgs/pro3.jpg')}}" alt="" title=""></td>
                                    <td>Notebook Asus Aspire <br>
                                        $375</td>
                                    <td>$9 375 <br>
                                        25 sales</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/imgs/pro4.jpg')}}" alt="" title=""></td>
                                    <td>Notebook Asus Aspire <br>
                                        $375</td>
                                    <td>$9 375 <br>
                                        25 sales</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/imgs/pro5.jpg')}}" alt="" title=""></td>
                                    <td>Notebook Asus Aspire <br>
                                        $375</td>
                                    <td>$9 375 <br>
                                        25 sales</td>
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
        <!-- End chart box one -->
        <!-- chart box two -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Top 5 of customers countries</h5>
                            <div class="ml-auto text-light-blue"> <a href="#" class="pull-left text-light-blue inline-block refresh mr-15"> <i class="fas fa-sync"></i> Update </a> </div>


                        </div>
                        <ul class="list-inline m-t-30 m-b-20 weight-500 text-dark text-uppercase lp-5 font-medium font-12">
                            <li>1. Ukraine <span class="text-pink">29.5%</span></li>
                            <li>2. USA <span class="text-primary">29.5%</span></li>
                            <li>3. Canada <span class="text-warning">29.5%</span></li>
                            <li>4. Australia <span class="text-turqoise">29.5%</span></li>
                            <li>5. Russia <span class="text-purple">29.5%</span></li>
                        </ul>
                        <div id="world-map-markers" style="height: 400px"></div>

                    </div>


                </div>
            </div>
            <!-- Column -->
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
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>


    <script>
        // MAterial Date picker    

        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
    </script>

    <!-- Vector map JavaScript -->
    <script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- Dashboard JS -->
    <script src="{{asset('assets/js/dashboard-shop-2.js')}}"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush