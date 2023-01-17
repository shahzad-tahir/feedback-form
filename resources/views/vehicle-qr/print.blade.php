<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print QR Code</title>
    <style>
        .print {
            text-align: center;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            width: 400px !important;
            height: 450px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 50px;
        }
    </style>
</head>
<body>
<div id="print" class="print center">
    <img src="{{ asset('logo.svg') }}" alt="" height="50">
    <h2>Scan the QR code for Customer Feedback</h2>
    <img src="/storage{{$vehicleQR->qr_code_image}}" height="300px" width="300px" alt="">
    <h2>Bus No. {{ $vehicleQR->number }}</h2>
    <small>Powered by {{ env('APP_URL') }}</small>
</div>
</body>
<script>
    var printContents = document.getElementById("print").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
</script>
</html>
