@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            @if(Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                    <i class="mdi mdi-alert-circle-outline mr-2"></i>{{ Session::get('message') }}
                    <script>
                        setTimeout(function () {
                            $('div.alert').toggle(1000);
                        }, 3500);
                    </script>
                </div>
            @endif
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <a href="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle shadow-lg bg-primary border-primary border">
                                        <i class="fe-user-check font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
{{--                                        <h2 class="text-dark mt-1"><span--}}
{{--                                                data-plugin="counterup">{{ $contractors }}</span>--}}
{{--                                        </h2>--}}
                                        <p class="text-muted font-weight-bold font-18 mb-1 text-truncate">Total
                                            Contractors</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-4 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <a href="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle shadow-lg bg-warning border-warning border">
                                        <i class="fe-truck font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
{{--                                        <h2 class="text-dark mt-1"><span--}}
{{--                                                data-plugin="counterup">{{ $loadsCount }}</span>--}}
{{--                                        </h2>--}}
                                        <p class="text-muted font-weight-bold font-18 mb-1 text-truncate">Total
                                            Loads</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-4 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <a href="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle shadow-lg bg-success border-success border">
                                        <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
{{--                                        <h2 class="text-dark mt-1"><span--}}
{{--                                                data-plugin="counterup">{{ $settlements }}</span>--}}
{{--                                        </h2>--}}
                                        <p class="text-muted font-weight-bold font-18 mb-1 text-truncate">Total
                                            Settlements</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Top 10 Contractors This Month</h4>
                        <br>
                        <div id="top-contractors" style="width: 100%; height: 700px"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('cssheader')
    <!-- third party css -->
    <link href="{{ asset('assets/admin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/admin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/admin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->
@endsection
@section('jsfooter')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);
        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([]);

            var options = {
                width: 800,
                bars: 'horizontal', // Required for Material Bar Charts.
                series: {
                    0: { axis: 'amount' }, // Bind series 0 to an axis named 'loads'.
                    1: { axis: 'loads' } // Bind series 1 to an axis named 'amount'.
                },
                axes: {
                    x: {
                        loads: {label: 'Count'}, // Bottom x-axis.
                        amount: {side: 'top', label: 'Amount'} // Top x-axis.
                    }
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top-contractors'));
            chart.draw(data, options);
        }
    </script>
    <!-- third party js -->
    <script src="{{ asset('assets/admin/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
@endsection
