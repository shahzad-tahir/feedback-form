@extends('layouts.admin.master')
@php
    $forVehicle = !empty($vehicle) ? $vehicle->name.' ('.$vehicle->number.')': null;
    $forDateRange = !empty($date) ? $date : null;
    $dynamicTitle = $forVehicle ?? $forDateRange;
    $title = 'Feedback Report | '.$dynamicTitle;
@endphp
@section('title', $title)
@section('content')
    <style>
        .dataTables_wrapper .dt-buttons {
            float:right;
            padding: 5px;
        }
    </style>
    <br>
    <div class="content">
        @include('alert')
        <div class="card">
            <div class="card-body">
                <h5><span class="fa fa-tools mr-2"></span>QUICK ACTIONS</h5>
                <a href="{{ route('reports.index') }}" class="btn btn-success btn-sm ">Back to Reports</a>
            </div>
        </div>
        <!-- end row-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Customer Feedback Count Report for {{ $dynamicTitle }}</h4>
                        <table id="data-table-butns" class="table w-100 nowrap">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th>Excellent</th>
                                <th>Good</th>
                                <th>Satisfactory</th>
                                <th>Unsatisfactory</th>
                                <th>Not Acceptable</th>
                                <th>Yes</th>
                                <th>No</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $key => $question)
                                <tr>
                                    <td>{{ $question }}</td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][1] }}
                                    </td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][2] }}
                                    </td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][3] }}
                                    </td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][4] }}
                                    </td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][5] }}
                                    </td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][6] }}
                                    </td>
                                    <td>
                                        {{ $report[$loop->iteration - 1][7] }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
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
    <script src="{{ asset('assets/admin/libs/datatables/jszip.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script>
        $("#data-table-butns").DataTable({
            dom: 'Bfrtip',
            paging: false,
            ordering: false,
            info: false,
            lengthChange: !1,
            bFilter: false,
            buttons: ["copy", "print", "excel"],
        });
    </script>
@endsection
