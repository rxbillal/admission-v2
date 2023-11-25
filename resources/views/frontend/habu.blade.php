<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admission Letter</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <style>
        body {
          font-family: "Times New Roman", Times, serif !important;
          font-size:23px !important;
        }
        </style>
    <title>mPDF Example</title>
</head>
<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <img  align="left" alt="" src="frontend/assets/images/logo.png" style="width: 30%"/><br>
                <h5><b>OFFICE OF THE REGISTRAR</b></h5>
            </div>
        </div>
        <div class="col-12 text-right">
            <br><br><br>
            <p>{{date('jS F, Y')}}</p>
        </div>
    </div>   
</html>
