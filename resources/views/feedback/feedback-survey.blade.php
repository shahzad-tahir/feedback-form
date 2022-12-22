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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container container-fluid w-lg-50 w-md-50 w-xl-40 mt-lg-5 mb-lg-5 w-sm-100 border"
     style="max-width: 800px; background-color: #f7f8f9 !important;">
    <div class=" mt-lg-5 mb-5">
        <div class="row text-center mt-4">
            <div class="media">
                <img src="{{ asset('logo.svg') }}" width="250px" height="250px"
                     class="img-fluid img-thumbnail align-self-center" alt="logo">
            </div>
        </div>
        <div class="row mt-5">
            <div class="text-center">
                <h5>Customer Feedback for <br> <b>Bus No. {{ $vehicleQR->number }}</b></h5>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <form action="{{ route('feedback.store') }}" method="POST" novalidate>
                    @csrf
                    <input type="hidden" name="vehicle_qr_id" value="{{ $vehicleQR->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="customer_name" class="mb-1">Name of Passenger (Optional)</label>
                                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control"
                                           placeholder="Enter your full name">
                                    @error('customer_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="contact_no" class="mb-1">Contact Number (Optional)</label>
                                    <input type="text" name="contact_no" value="{{ old('contact_no') }}" class="form-control"
                                           placeholder="Enter your contact number">
                                    @error('contact_no')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="email" class="mb-1">Email Address (Optional)</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                           placeholder="Enter your email address">
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="trip_date" class="mb-1">Trip Date (Mandatory)</label>
                                    <input type="date" name="trip_date" value="{{ old('trip_date') }}" min="{{ date('Y-m-d', strtotime(date('Y-m-d'). ' - 2 days')) }}" max="{{ date('Y-m-d') }}" class="form-control" required/>
                                    @error('trip_date')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="trip_time" class="mb-1">Trip Time (Mandatory)</label>
                                    <input type="time" name="trip_time" value="{{ old('trip_time') }}" class="form-control" required>
                                    @error('trip_time')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        @foreach($questions as $key => $question)
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="{{ $key }}"
                                           class="mb-1">{{ 'Q'.$loop->iteration.'. '.$question }}</label>
                                    <select name="{{ $key }}" id="{{ $key }}" class="form-control" {{ in_array($key,$rules) ? 'required' : '' }}>
                                        <option selected disabled>Select</option>
                                        @foreach($options as $opKey => $option)
                                            <option value="{{ $opKey }}" {{ $opKey == old($key) ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error($key)
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                            <div class="row mt-1 mb-3">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="remarks"
                                           class="mb-1">Overall/Any other comments</label>
                                    <textarea name="remarks" class="form-control mb-1" id="remarks" cols="30" rows="4" placeholder="Remarks">{{ old('remarks') }}</textarea>
                                </div>
                            </div>
                        <button class="btn btn-dark btn-lg" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
