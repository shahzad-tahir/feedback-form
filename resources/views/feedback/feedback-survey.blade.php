<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Feedback</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        input[type="radio"]{
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

        input[type="radio"]:checked::before{
            position: absolute;
            color: green !important;
            content: "\00A0\2713\00A0" !important;
            border: 1px solid #d3d3d3;
            font-weight: bolder;
            font-size: 21px;
        }
    </style>
</head>
<body>
<div class="container container-fluid">
    <div class="card mt-lg-5 mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <div class="media">
                        <img src="{{ asset('assets/admin/images/favicon.ico') }}" width="100px" height="100px"
                             class="img-fluid img-thumbnail align-self-center mr-3" alt="...">
                    </div>
                </div>
                <div class="col-md-6 text-center mt-4">
                    <h2>Customer Feedback</h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <section>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="vehicle_qr_id" value="{{ $vehicleQR->id }}">
                            <table class="table table-bordered table-responsive-lg text-center">
                                <tr>
                                    <td colspan="2" style="text-align: left !important;">Name of Passenger (Optional)
                                    </td>
                                    <td colspan="5"><input type="text" name="customer_name" class="form-control"
                                                           placeholder="Enter your name here"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: left !important;">Contact Number (Optional)</td>
                                    <td colspan="5"><input type="text" name="contact_no" class="form-control"
                                                           placeholder="Enter your contact number here"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: left !important;">Email Address (Optional)</td>
                                    <td colspan="5"><input type="text" name="email" class="form-control"
                                                           placeholder="Enter your email address here"></td>
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
                                @foreach($questions as $key => $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-align: left !important;">{{ $question }}</td>
                                        <td><input type="radio" name="{{ $key }}" value="5"></td>
                                        <td><input type="radio" name="{{ $key }}" value="4"></td>
                                        <td><input type="radio" name="{{ $key }}" value="3"></td>
                                        <td><input type="radio" name="{{ $key }}" value="2"></td>
                                        <td><input type="radio" name="{{ $key }}" value="1"></td>
                                    </tr>
                                @endforeach
                            </table>
                            <hr class="mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remarks" style="text-align: left !important;"
                                               class="mb-2">Remarks</label>
                                        <textarea name="remarks" cols="7" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" style="float: right !important;">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
