<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print QR Code</title>
</head>
<body style="text-align: center; padding: 50px">
<h2>Vehicle: {{ $vehicleQR->name }}</h2>
<h2>Vehicle Number: {{ $vehicleQR->number }}</h2>
<h3>QR Code</h3>
<img src="/storage{{$vehicleQR->qr_code_image}}" height="300px" width="300px" alt="">
</body>
<script>
    window.print();
</script>
</html>
