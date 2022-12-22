<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Print All QR Codes</title>
    <style>
        @media print {
            .pagebreak {
                clear: both;
                page-break-after: always;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div id="print" class="container" style="color-adjust: exact; -webkit-print-color-adjust: exact;">
    <div class="row">
        @foreach($qrCodes->chunk(6) as $chunk)
            @foreach($chunk as $qrcode)
                <div class="col-md-5">
                    <div class="border bg-black p-lg-2 mb-lg-3">
                        <div class="align-content-center text-white text-center" style="max-height: 300px">
                            <h5 class="p-2">Scan the QR code for Customer Feedback</h5>
                            <img src="/storage{{$qrcode->qr_code_image}}" height="150px" width="150px" alt="">
                            <h5 class="p-3">Bus No. {{ $qrcode->number }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pagebreak" style="margin-top: 200px"></div>
        @endforeach
    </div>
</div>
</body>
<script>
    // var printContents = document.getElementById("print").innerHTML;
    // var originalContents = document.body.innerHTML;
    //
    // document.body.innerHTML = printContents;
    //
    // window.print();
    //
    // document.body.innerHTML = originalContents;
    const element = document.getElementById('print');
    // Choose the element and save the PDF for your user.
    html2pdf().from(element).save();
</script>
</html>
