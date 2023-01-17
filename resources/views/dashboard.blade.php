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
                <div class="col-md-4 col-xl-6">
                    <div class="widget-rounded-circle card-box">
                        <a href="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle shadow-lg bg-primary border-primary border">
                                        <i class="fa fa-car fa-2x font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h2 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ $vehicleCount }}</span>
                                        </h2>
                                        <p class="text-muted font-weight-bold font-18 mb-1 text-truncate">Total
                                            Vehicles</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </a>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-4 col-xl-6">
                    <div class="widget-rounded-circle card-box">
                        <a href="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle shadow-lg bg-warning border-warning border">
                                        <i class="fa fa-clipboard fa-2x font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h2 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ $feedbacks }}</span>
                                        </h2>
                                        <p class="text-muted font-weight-bold font-18 mb-1 text-truncate">Total
                                            Feedbacks</p>
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
                    <div class="card-box" style="overflow-x: scroll;">
                        <form action="{{ route('dashboard') }}" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vehicle_id">Vehicle</label>
                                        <select name="vehicle_id" id="vehicle_id"
                                                class="form-control custom-select">
                                            <option disabled selected>Select Vehicle</option>
                                            @foreach($vehicles as $vehicle)
                                                <option
                                                    value="{{ $vehicle->id }}" {{ request()->vehicle_id == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->name.' ('.$vehicle->number.')' }}</option>
                                            @endforeach
                                        </select>
                                        @error('vehicle_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date_range">Date Range</label>
                                        <input type="text" class="form-control range-datepicker" id="date_range"
                                               name="date_range"
                                               value="{{ request()->date_range }}" placeholder="Date Range">
                                        @error('date_range')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 mt-1">
                                    <button class="btn btn-sm btn-primary mt-3" type="submit">Set Filter
                                    </button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-danger mt-3" type="submit">Reset
                                        Filter
                                    </a>
                                </div>

                            </div>
                        </form>
                        <div id="feedback" style="width: 200%; height: 700px;"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card-box" style="overflow-x: scroll;">
                        <div id="vehicle-feedbacks" style="width: 100%; height: 700px;"></div>
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
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable(@json($graph));

            var options = {
                chart: {
                    title: 'Customer Feedback',
                    subtitle: 'Services ratings by customers',
                },
                hAxis: {showTextEvery: 1}
            };

            var chart = new google.charts.Bar(document.getElementById('feedback'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable(@json($graph2));

            var options = {
                chart: {
                    title: 'Vehicle Feedbacks',
                    subtitle: 'Feedbacks given to a vehicle',
                },
                hAxis: {showTextEvery: 1}
            };

            var chart = new google.charts.Bar(document.getElementById('vehicle-feedbacks'));
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
