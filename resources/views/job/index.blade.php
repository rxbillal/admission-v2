


<!DOCTYPE html>
<!-- saved from url=(0034)https://admission.kum.edu.ng/login -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="description" content="Responsive Admin Template">
    <meta name="author" content="Khadija University Majia - Admission Application">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Application Process</title>
    <!-- google font -->
    <style type="text/css">
        h6 {
            border-bottom: 1px solid rgb(200, 200, 200);
        }
    </style>

    <link href="{{asset('job/css')}}" rel="stylesheet" type="text/css">
    <!-- icons -->

    <link rel="stylesheet" href="{{asset('job/all.css')}}" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('job/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('job/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- style -->
    <link rel="stylesheet" href="{{asset('job/extra_pages.css')}}">
    <link rel="stylesheet" href="{{asset('job/customStyle.css')}}">
    <link href="{{asset('job/toastr.css')}}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="https://admission.kum.edu.ng/frontend/assets/images/favicon.ico">
</head>

<body>
<div class="limiter">
    <div class="container-login100 bg_ab">
        <div class="wrap-login100">

            <form id="app_sub" enctype="multipart/form-data">
                <span class="">
              <img alt="" src="{{asset('job/logo.png')}}" style="width: 100%">
            </span>

                <br />

                <p style="
                color: #276c2a;
                padding-bottom: 20px;
                padding-top: 20px;
                font-size: 16px;
                text-align: center;
              ">
                    Application for Positions into Khadija University Majia
                </p>

                <b style="color: red"> </b>

                <input class="i_ab_style" type="text" name="name" placeholder="Applicant's Full Name" required>

                <input class="i_ab_style" type="number" id='phone' name="number" placeholder="Phone Number" required>

                <input class="i_ab_style" type="email" id="email" name="email" placeholder="Enter Email" required>


                <select class="i_ab_style" name="application_type" id="type" required>

                    <option value="">---------------------------Application Type---------------------------</option>
                    <option value="1">Academic</option>
                    <option value="2">Non-Academic</option>
                </select>

                <select class="i_ab_style" name="faculty" id="faculty" required>

                    <option value="">---------------------------Select Faculty--------------------------------</option>

                    <option value="">Load faculty</option>

                </select>
                <select class="i_ab_style" name="dep" id="dep" required>

                    <option value="">-------------------------Select Department-------------------------</option>

                    <option value="">Load department</option>

                </select>


                <select class="i_ab_style" name="position" id="position" required>

                    <option value="">---------------------------Select Position---------------------------</option>

                    <option value="">Load positions</option>

                </select>
                <label class="small">UPload CV</label>
                <input class="i_ab_style"  type="file" name="fileToUpload" id="fileToUpload" required>
                <span style=" color: red;" id="msg"></span>

                <div style="text-align:center; padding-bottom:10px;">

                    <input type="submit" name="submit" value="Submit" id="sbtn" class="s_ab">
                </div>

            </form>

        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{asset('job/jquery.min.js.download')}}"></script>
<!-- bootstrap -->
<script src="{{asset('job/bootstrap.bundle.js.download')}}"></script>
<script src="{{asset('job/toastr.min.js.download')}}"></script>
<script src="{{asset('job/frontend.js.download')}}"></script>
<!-- <script src="../assets/js/pages/extra-pages/pages.js')}}"></script> -->
<!-- end js include path -->
<script>
    $(document).ready(function() {


        $('#fileToUpload').bind('change', function() {
            $('#msg').text('')
            $('#sbtn').prop("disabled",false);
            //this.files[0].size gets the size of your file.
            console.log(this.files[0])
            if(this.files[0].type !== 'application/pdf'){
                $('#msg').text('PDF file required')
                $('#sbtn').prop("disabled",true);
            }
            if(this.files[0].size > 40960){
                $('#sbtn').prop("disabled",true);
                $('#msg').text("PDF file size can't be grather than 40KB");
            }
        });
        var base   = window.location.origin;
        function formReset(){
            $(".select2bs4").val(null).trigger('change');
            $(".select2").val(null).trigger('change');
            $('.modal').modal('hide');
            $('form').trigger("reset");
            $("input[type=text],input[type=file],input[type=email],input[type=password], textarea").val("");
            $('#summernote').summernote('code', '');
        }
        $('#phone').on('keyup',function () {
            let r = $(this).val();
            if(r.length > 12){
                $('#sbtn').prop("disabled",true);
                $('#msg').text('Phone number must be in 11 digits')
            }else{
                $('#msg').text('')
                $('#sbtn').prop("disabled",false);
            }
        })
        $('#type').on('change',function () {
            $("#faculty option").prop("selected", false).trigger( "change" );
            $("#dep option").prop("selected", false).trigger( "change" );
            $("#position option").prop("selected", false).trigger( "change" );
            if($(this).val() == 1){
                $('#faculty').show();
                $('#dep').show();
                $('#faculty').prop('required',true);
                $('#dep').prop('required',true);
                Aca();
            }else{
                $('#faculty').hide();
                $('#dep').hide();
                $('#faculty').prop('required',false);
                $('#dep').prop('required',false);
                nonAca();
            }
        })
        $('#faculty').on('change',function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#dep option").prop("selected", false).trigger( "change" );
            var my_url = window.location.origin +"/position/"+$(this).val();
            $.ajax({
                type: 'get',
                url: my_url,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data)
                    $("#dep").empty();
                    $("#dep").append('<option >Select Department</option>');
                    $.each(data.dep_list, function(index, item) {
                        $("#dep").append('<option value='+item.id+'>'+item.job_title+'</option>');
                    });
                },
                error: function (data) {
                    console.log(data)
                }
            });

        })

        $('#app_sub').submit(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            //$('#sbtn').attr("disabled",true).text('Submitting...');
            var formData = new FormData(this);
            var  my_url = base + "/job-application-store";

            $.ajax({
                type: 'post',
                url: my_url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    toastr.success(data.msg)
                    formReset();
                    //  location.reload();
                },
                error: function (data) {
                    console.log(data)
                    if (data.type === 0) {
                        toastr.error(data.msg)
                    }else{
                        toastr.error('Login Failed')
                    }
                }
            });
        });
        function nonAca() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var my_url = window.location.origin +"/non-position";
            $.ajax({
                type: 'get',
                url: my_url,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#position").empty();
                    $("#position").append('<option >Select Postion</option>');
                    $.each(data.job_list, function(index, item) {
                        $("#position").append('<option value='+item.id+'>'+item.job_title+'</option>');
                    });
                },
                error: function (data) {
                    console.log(data)
                }
            });
        }
        function Aca() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var my_url = window.location.origin +"/faculty-list";
            $.ajax({
                type: 'get',
                url: my_url,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data)
                    $("#faculty").empty();
                    $("#faculty").append('<option >Select Faculty</option>');
                    $.each(data.faculty_list, function(index, item) {
                        $("#faculty").append('<option value='+item.id+'>'+item.fac_title+'</option>');
                    });

                    $("#position").empty();
                    $("#position").append('<option >Select Position</option>');
                    $.each(data.job_list, function(index, item) {
                        $("#position").append('<option value='+item.id+'>'+item.job_title+'</option>');
                    });
                },
                error: function (data) {
                    console.log(data)
                }
            });
        }
        $('#email').on('input', function(){
            if($(this).val().length > 12){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var my_url = window.location.origin +"/mail-check/"+$(this).val();
                $.ajax({
                    type: 'get',
                    url: my_url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#sbtn').prop("disabled",data.btn);
                        $('#msg').text(data.message)
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            }

        })
    });

</script>

</body></html>
