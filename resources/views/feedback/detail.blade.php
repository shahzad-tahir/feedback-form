@extends('layouts.admin.master')
@section('title', 'Feedback Detail')
@section('content')
    <style>
        @media (min-width:768px) {
            input[type="radio"] {
                appearance: none;
                border: 1px solid #d3d3d3;
                width: 30px;
                height: 30px;
                content: none;
                outline: none;
                margin: 0;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px -1px;
            }

            input[type="radio"]:checked {
                appearance: none;
                outline: none;
                padding: 0;
                content: none;
                border: none;
            }

            input[type="radio"]:checked::before {
                position: absolute;
                color: green !important;
                content: "\00A0\2713\00A0" !important;
                border: 1px solid #d3d3d3;
                font-weight: bolder;
                font-size: 21px;
            }
        }
    </style>
    <br>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <h5><span class="fa fa-tools mr-2"></span>QUICK ACTIONS</h5>
                <a href="{{ route('feedback.index') }}" class="btn btn-success btn-sm ">Feedbacks</a>
            </div>
        </div>
        <div class="card mt-lg-1 mb-5">
            <div class="card-body">
                <h4 class="header-title">Feedback Detail</h4>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <section>
                            <input type="hidden" name="vehicle_qr_id" value="{{ $feedback->id }}">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <td colspan="2" style="text-align: left !important;">Name of Passenger
                                            (Optional)
                                        </td>
                                        <td colspan="5"><input type="text" name="customer_name" class="form-control"
                                             value="{{ $feedback->customer_name ?? 'N/A' }}" placeholder="Enter your name here" readonly></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: left !important;">Contact Number
                                        </td>
                                        <td colspan="5"><input type="text" name="contact_no" class="form-control"
                                             value="{{ $feedback->contact_no ?? 'N/A' }}" placeholder="Enter your contact number here" readonly></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: left !important;">Email Address
                                        </td>
                                        <td colspan="5"><input type="text" name="email" class="form-control"
                                             value="{{ $feedback->email ?? 'N/A' }}" placeholder="Enter your email address here" readonly></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: left !important;">Trip Date
                                        </td>
                                        <td colspan="5"><input type="date" class="form-control"
                                                               value="{{ $feedback->trip_date ?? 'N/A' }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: left !important;">Trip Time
                                        </td>
                                        <td colspan="5"><input type="time" class="form-control"
                                                               value="{{ $feedback->trip_time ?? 'N/A' }}" readonly></td>
                                    </tr>
                                    <tr class="bg-info">
                                        <td>SI#</td>
                                        <td style="text-align: left !important;">Description</td>
                                        <td>Excellent</td>
                                        <td>Good</td>
                                        <td>Satisfactory</td>
                                        <td>Unsatisfactory</td>
                                        <td>Not Acceptable</td>
                                    </tr>
                                    @php $answers = $feedback?->answers; @endphp
                                    @foreach($questions as $key => $question)
                                        @php $answer = $answers->where('question', $key)->first(); @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="text-align: left !important;">{{ $question }}</td>
                                            <td>
                                                <input type="radio" name="{{ $key }}" value="5"
                                                       {{ $answer?->answer == 5 ? 'checked' : '' }} disabled>
                                            </td>
                                            <td>
                                                <input type="radio" name="{{ $key }}" value="4"
                                                       {{ $answer?->answer == 4 ? 'checked' : '' }} disabled>
                                            </td>
                                            <td>
                                                <input type="radio" name="{{ $key }}" value="3"
                                                       {{ $answer?->answer == 3 ? 'checked' : '' }} disabled>
                                            </td>
                                            <td>
                                                <input type="radio" name="{{ $key }}" value="2"
                                                       {{ $answer?->answer == 2 ? 'checked' : '' }} disabled>
                                            </td>
                                            <td>
                                                <input type="radio" name="{{ $key }}" value="1"
                                                       {{ $answer?->answer == 1 ? 'checked' : '' }} disabled>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <hr class="mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remarks" style="text-align: left !important;"
                                               class="mb-2">Remarks</label>
                                        <textarea name="remarks" cols="7" rows="3" class="form-control" readonly>{{ $feedback->remarks }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
