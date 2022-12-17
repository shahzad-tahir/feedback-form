@extends('layouts.admin.master')
@section('title', 'Create Vehicle QR Code')
@section('content')
    <br>
    <div class="content">
        @include('alert')
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Vehicle QR Code</h4>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <form enctype="multipart/form-data" method="POST"
                              action="{{ route('vehicle-qr.store') }}" class="needs-validation validateForm"
                              novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                               placeholder="Enter Vehicle Name" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="number">Number</label>
                                        <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}"
                                               placeholder="Enter Vehicle Number">
                                        @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Create
                            </button>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection
