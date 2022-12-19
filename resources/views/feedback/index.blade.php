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
                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>QR Code</th>
                                <th>Action(s)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->customer_name ?? 'N/A' }}</td>
                                    <td>{{ $feedback->contact_no ?? 'N/A' }}</td>
                                    <td>{{ $feedback->email ?? 'N/A' }}</td>
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
