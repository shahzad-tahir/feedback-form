@extends('layouts.admin.master')
@section('title', 'Customer Feedbacks')
@section('content')
    <br>
    <div class="content">
        @include('alert')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Customer Feedbacks</h4>
                        <br>
                        <form action="{{ route('feedback.index') }}" method="GET">
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
                        <table id="scroll-vertical-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Trip Date</th>
                                <th>Trip Time</th>
                                <th>Action(s)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->customer_name ?? 'N/A' }}</td>
                                    <td>{{ $feedback->contact_no ?? 'N/A' }}</td>
                                    <td>{{ $feedback->email ?? 'N/A' }}</td>
                                    <td>{{ $feedback->trip_date ?? 'N/A' }}</td>
                                    <td>{{ $feedback->trip_time ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('feedback.detail', $feedback->id) }}"
                                           class="btn btn-xs btn-primary mb-1">View</a>
                                        <form action="{{ route('feedback.destroy', $feedback->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
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
    <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
@endsection
