@extends('layouts.admin.master')
@section('title', 'Vehicle QR Codes')
@section('content')
    <br>
    <div class="content">
        @include('alert')
        <div class="card">
            <div class="card-body">
                <h5><span class="fa fa-tools mr-2"></span>QUICK ACTIONS</h5>
                <a href="{{ route('vehicle-qr.create') }}" class="btn btn-success btn-sm ">Create Vehicle QR Code</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Vehicle QR Codes</h4>
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
                            @foreach ($vehicleQrs as $qr)
                                <tr>
                                    <td>{{ $qr->name }}</td>
                                    <td>{{ $qr->number }}</td>
                                    <td><img src="storage{{$qr->qr_code_image}}" class="img-fluid img-thumbnail img-thumbnail" alt=""></td>
                                    <td>
                                        <a href="{{ route('vehicle-qr.print', $qr->id) }}" target="_blank"
                                           class="btn btn-xs btn-primary mb-1">Print</a>
                                        <form action="{{ route('vehicle-qr.destroy', $qr->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</button>
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
