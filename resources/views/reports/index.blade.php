@extends('layouts.admin.master')
@section('title', 'Reports')
@section('content')
    <br>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Generate Report</h4>
                        <hr>
                        <br>
                        <form action="{{ route('reports.generate') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="vehicle_id">Vehicle</label>
                                        <select name="vehicle_id" id="vehicle_id"
                                                class="form-control custom-select">
                                            <option disabled selected>Select Vehicle</option>
                                            @foreach($vehicles as $vehicle)
                                                <option
                                                    value="{{ $vehicle->id }}" {{ old('vehicle_id') === $vehicle->id ? 'selected' : '' }}>{{ $vehicle->name.' ('.$vehicle->number.')' }}</option>
                                            @endforeach
                                        </select>
                                        @error('vehicle_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_range">Date Range</label>
                                        <input type="text" class="form-control range-datepicker" id="date_range"
                                               name="date_range"
                                               value="{{ old('date_range') }}" placeholder="Date Range">
                                        @error('date_range')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <button class="btn btn-primary mt-3" type="submit">Generate Report
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <hr>
                        <div id="loads"></div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
