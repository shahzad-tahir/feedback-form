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
</head>
<body>
<div class="container container-fluid">
    <div class="card mt-lg-5 mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <div class="media">
                        <img src="{{ asset('assets/admin/images/favicon.ico') }}" width="100px" height="100px" class="img-fluid img-thumbnail align-self-center mr-3" alt="...">
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
                        <form action="">
                            <table class="table table-bordered table-responsive-lg text-center">
                                <tr>
                                    <td colspan="2" style="text-align: left !important;">Name of Passenger (Optional)</td>
                                    <td colspan="5"><input type="text" name="name" class="form-control" placeholder="Enter your name here"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: left !important;">Contact Number (Optional)</td>
                                    <td colspan="5"><input type="text" name="contact_number" class="form-control" placeholder="Enter your contact number here"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: left !important;">Email Address (Optional)</td>
                                    <td colspan="5"><input type="text" name="email" class="form-control" placeholder="Enter your email address here"></td>
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
                                <tr>
                                    <td>1</td>
                                    <td style="text-align: left !important;">How is the Ride?</td>
                                    <td><input type="radio" name="q1" value="5"></td>
                                    <td><input type="radio" name="q1" value="4"></td>
                                    <td><input type="radio" name="q1" value="3"></td>
                                    <td><input type="radio" name="q1" value="2"></td>
                                    <td><input type="radio" name="q1" value="1"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td style="text-align: left !important;">Air Conditioning in the Bus?</td>
                                    <td><input type="radio" name="q2" value="5"></td>
                                    <td><input type="radio" name="q2" value="4"></td>
                                    <td><input type="radio" name="q2" value="3"></td>
                                    <td><input type="radio" name="q2" value="2"></td>
                                    <td><input type="radio" name="q2" value="1"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style="text-align: left !important;">Seats / Curtains In the Bus?</td>
                                    <td><input type="radio" name="q3" value="5"></td>
                                    <td><input type="radio" name="q3" value="4"></td>
                                    <td><input type="radio" name="q3" value="3"></td>
                                    <td><input type="radio" name="q3" value="2"></td>
                                    <td><input type="radio" name="q3" value="1"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td style="text-align: left !important;">Is Driver Driving Safely?</td>
                                    <td><input type="radio" name="q4" value="5"></td>
                                    <td><input type="radio" name="q4" value="4"></td>
                                    <td><input type="radio" name="q4" value="3"></td>
                                    <td><input type="radio" name="q4" value="2"></td>
                                    <td><input type="radio" name="q4" value="1"></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td style="text-align: left !important;">Safe Distance Maintaining while driving?</td>
                                    <td><input type="radio" name="q5" value="5"></td>
                                    <td><input type="radio" name="q5" value="4"></td>
                                    <td><input type="radio" name="q5" value="3"></td>
                                    <td><input type="radio" name="q5" value="2"></td>
                                    <td><input type="radio" name="q5" value="1"></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td style="text-align: left !important;">Driving on the Humps?</td>
                                    <td><input type="radio" name="q6" value="5"></td>
                                    <td><input type="radio" name="q6" value="4"></td>
                                    <td><input type="radio" name="q6" value="3"></td>
                                    <td><input type="radio" name="q6" value="2"></td>
                                    <td><input type="radio" name="q6" value="1"></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td style="text-align: left !important;">Does the Driver Follow RTA Rules/ Traffic Signs Always?</td>
                                    <td><input type="radio" name="q7" value="5"></td>
                                    <td><input type="radio" name="q7" value="4"></td>
                                    <td><input type="radio" name="q7" value="3"></td>
                                    <td><input type="radio" name="q7" value="2"></td>
                                    <td><input type="radio" name="q7" value="1"></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td style="text-align: left !important;">Driver's uniform condition?</td>
                                    <td><input type="radio" name="q8" value="5"></td>
                                    <td><input type="radio" name="q8" value="4"></td>
                                    <td><input type="radio" name="q8" value="3"></td>
                                    <td><input type="radio" name="q8" value="2"></td>
                                    <td><input type="radio" name="q8" value="1"></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td style="text-align: left !important;">How is the Driver's Behaviour?</td>
                                    <td><input type="radio" name="q9" value="5"></td>
                                    <td><input type="radio" name="q9" value="4"></td>
                                    <td><input type="radio" name="q9" value="3"></td>
                                    <td><input type="radio" name="q9" value="2"></td>
                                    <td><input type="radio" name="q9" value="1"></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td style="text-align: left !important;">Please comment on Driver's Grooming?</td>
                                    <td><input type="radio" name="q10" value="5"></td>
                                    <td><input type="radio" name="q10" value="4"></td>
                                    <td><input type="radio" name="q10" value="3"></td>
                                    <td><input type="radio" name="q10" value="2"></td>
                                    <td><input type="radio" name="q10" value="1"></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td style="text-align: left !important;">Does Driver Use hands free while driving?</td>
                                    <td><input type="radio" name="q11" value="5"></td>
                                    <td><input type="radio" name="q11" value="4"></td>
                                    <td><input type="radio" name="q11" value="3"></td>
                                    <td><input type="radio" name="q11" value="2"></td>
                                    <td><input type="radio" name="q11" value="1"></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td style="text-align: left !important;">Do you always reach on Time?</td>
                                    <td><input type="radio" name="q12" value="5"></td>
                                    <td><input type="radio" name="q12" value="4"></td>
                                    <td><input type="radio" name="q12" value="3"></td>
                                    <td><input type="radio" name="q12" value="2"></td>
                                    <td><input type="radio" name="q12" value="1"></td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td style="text-align: left !important;">Overall Comment ?</td>
                                    <td><input type="radio" name="q13" value="5"></td>
                                    <td><input type="radio" name="q13" value="4"></td>
                                    <td><input type="radio" name="q13" value="3"></td>
                                    <td><input type="radio" name="q13" value="2"></td>
                                    <td><input type="radio" name="q13" value="1"></td>
                                </tr>
                            </table>
                            <hr class="mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remarks" style="text-align: left !important;" class="mb-2">Remarks</label>
                                        <textarea name="remarks" cols="7" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" style="float: right !important;">Submit</button>
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
