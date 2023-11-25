<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Khadija University Admission Application</title>

    <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- BASE CSS -->
    <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/login/menu.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/login/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/login/vendors.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('frontend/assets/css/login/custom.css')}}" rel="stylesheet">

    <!-- MODERNIZR MENU -->
    <script src="{{asset('frontend/assets/js/login/modernizr.js')}}"></script>
</head>

<body>

<div id="preloader">
    <div data-loader="circle-side"></div>
</div><!-- /Preload -->

<div class="container-fluid">
    <div class="row row-height">

        <div class="col-xl-4 col-lg-4 content-left" style="height:750px;">
            <div class="content-left-wrapper" >
                <a href="{{url('dashboard')}}" id="logo"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="" style="width: 200px;" ></a>

                <!-- /social -->
                <div >

                    <br><br>
                    <p>Welcome  {{session('user')->first_name}} {{session('user')->last_name}}</p>

                    <a class="btn_1 rounded yellow" href="{{url('logout')}}"  class="btn btn-primary">Logout</a>


                    <figure><img src="{{asset('frontend/assets/images/login/1.png')}}" alt="" class="img-fluid" ></figure>
                </div>



                <div>
                </div>
                <div class="copy">© 2023 . Khadija University.</div>
            </div>
            <!-- /content-left-wrapper -->
        </div>
        <!-- /content-left -->
        <div class="col-xl-8 col-lg-8 content-right" id="start">

          {{--  <?php if(isset($_REQUEST['msg'])){
                echo "<h1 style='color:green'> Application Submited Successfully ✔</h1>";
            } ?>--}}
           @if(session('user')->survey == 1)
                <div class="row">
                    <div class="col-6 offset-3">
                        <table class="table  w-100">
                            <tr>
                                <td>Application ID:</td>
                                <td>
                                    <span>{{session('user')->application_id}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap>Application Status:</td>
                                <td nowrap>
                                    @if(session('user')->is_approve == 0)
                                        <button class="btn btn-sm btn-primary">Application Submitted</button>
                                    @else
                                        <button class="btn btn-sm btn-success">Admitted ({{session('user')->admitted_subject}})</button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td nowrap>Payment Status:</td>
                                <td>
                                    @if(session('user')->payment == 0)
                                        <button class="btn btn-sm btn-warning">Unpaid</button>
                                    @else
                                        <button class="btn btn-sm btn-success">Paid</button>
                                    @endif
                                </td>
                            </tr>
                             @if(session('user')->is_approve == 1)
                            <tr>
                                <td nowrap>Print Admission letter:</td>
                                <td><a target="_blank" class="btn btn-sm btn-primary" href="{{url('print')}}"><i class="fa fa-print" style="font-size:20px"></i></a></td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <div class="col-6 offset-3">
                        <div class="card">

                             @if(session('user')->is_approve == 0)
                           <div class="card-body">
                                Your Application for Admission into Khadija Univerity is Under-review we will notify you for the admission decisions in a few days. <br> <br> Thank you for Choosing Khadija University.
                            </div>
                                    @else
                                     <div class="card-body">
                                Congratulations!!!, You've been offered admission to study <b style= "font-style: italic";>({{session('user')->admitted_subject}}).</b>

                                 <br> <br> Thank you for Choosing Khadija University.
                                    @endif

                        </div>
                    </div>
                </div>
            @endif
            @if(session('user')->payment == 0)
                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                    <div class="text-center pt-5">
                        <button type="submit" class="btn btn-sm btn-primary">Buy Application Form</button>
                        <!--<button type="submit" class="btn btn-sm btn-primary">Fill Application Form</button>-->
                    </div>

                </form>



            @endif
            @if(session('user')->payment == 1 && session('user')->survey == 0)
            <div id="wizard_container">


                <div id="top-wizard">
                    <span id="location"></span>
                    <div id="progressbar"></div>
                </div>

                <!-- /top-wizard -->
                <form id="application_form" method="post" action="#" enctype="multipart/form-data">
                    <input id="website" name="website" type="text" value="">
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">

                        <!-- /Personal Information -->
                        <div class="step">
                            <h2 class="section_title">Personal Information </h2>

                            <div class="row add_top_30">
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <input type="text" name="first_name" id="first_name" class="form-control required " placeholder="First Name" value="{{session('user')->first_name}}" onchange="getVals(this, 'name_field');">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="text" name="last_name" id="last_name" class="form-control required " placeholder="Last Name" value="{{session('user')->last_name}}" onchange="getVals(this, 'name_field');">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group radio_input">
                                        <label class="container_radio mr-3">Male
                                            <input type="radio" name="gender" value="2"   class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container_radio">Female
                                            <input type="radio" name="gender" value="1"   class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="dob" value="" id="dob" class="form-control required " placeholder="Date of Birth">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="styled-select">
                                            <select class="form-control required styled " id="blood_group" name="blood_group">
                                                <option value="">Blood Group</option>
                                                @foreach($bloods as $blood)
                                                <option value='{{$blood->blood_code}}' >{{$blood->blood_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group radio_input">
                                        <label class="container_radio mr-3">Single
                                            <input type="radio" name="marital_status" value="single" checked class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container_radio">Married
                                            <input type="radio" name="marital_status" value="married" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" name="phone_number" id="phone_number" value="{{session('user')->phone}}" class="form-control required " placeholder="Phone Number">
                                    </div>
                                </div>
                              <!--  <div class="col-md-6">
                                    <div class="form-group">

                                        <select class="form-control required styled " id="nationality" name="nationality">
                                            <option value="">Nationality</option>
                                            @foreach($country as $c)
                                            <option value="{{$c->country_code}}" >{{$c->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>-->
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <select class="form-control required styled " id="country" name="country">
                                            <option value="">Country</option>
                                            @foreach($country as $c)
                                                <option value="{{$c->country_code}}" >{{$c->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control select2 required styled " id="state" name="state">
                                            <option value="">State</option>
                                            @foreach($city as $c)
                                                <option value="{{$c->city_code}}" >{{$c->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="custom">Address</label>
                                <textarea name="address" id="address" class="form-control required " style="height: 150px" placeholder="Address"></textarea>
                            </div>


                        </div>
                        <!-- /Personal Information -->

                        <!-- Next of Kin Information -->
                        <div class="step">
                            <h2 class="section_title">Next of Kin</h2>

                            <div class="row add_top_30">
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <input type="text" value="" name="nokfirst_name" id="nokfirst_name" class="form-control required" placeholder="First Name" onchange="getVals(this, 'name_field');" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="text" name="noklast_name" id="noklast_name" value=""  class="form-control required" placeholder="Last Name" onchange="getVals(this, 'name_field');" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control required styled" id="nok_relationship" name="nok_relationship">
                                            <option value="">Relationship</option>
                                            @foreach($relation as $c)
                                                <option value="{{$c->relation_code}}" >{{$c->relation_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nok_occupation" value="" id="nok_occupation" class="form-control required" placeholder="Occupation" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="custom">Address</label>
                                <textarea name="nok_address" id="nok_address" class="form-control required" placeholder="Address" style="height: 150px"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <input type="text" name="nok_phone_number" id="nok_phone_number" value="" class="form-control required" placeholder="Mobile" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="text" name="nok_email_address" id="nok_email_address" value="" class="form-control required" placeholder="Email" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Next of Kin Information -->

                        <input type="hidden" value="undergraduate" name="application_type">
                        <!-- /Undergraduate ============================== -->

                        <div class="step" >



                            <h5>JAMB Information</h5>
                            <div class="form-group add_top_30">
                                <input type="text" name="jamb_number" maxlength="10" minlength="10"  id="jamb_number" class="form-control required" placeholder="REGISTRATION NUMBER" >
                            </div>
                                <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <input type="text" disabled name="jamb_english_language" value="" id="jamb_english_language" class="form-control" placeholder="English Language">
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <div class="form-group ">
                                        <input type="number" max="100" name="jamb_english_language_score" value="" id="jamb_english_language_score" class="form-control required" placeholder="Score" >
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                         <select class="form-control form-control required styled" name="jamb_subject_2" id="jamb_subject_2">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>
                                        <!--<input type="text" name="jamb_subject_2" id="jamb_subject_2" class="form-control" placeholder="Subject" >-->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="number" max="100" name="jamb_subject_score_2" id="jamb_subject_score_2" class="form-control" placeholder="Score" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                         <select class="form-control form-control required styled" name="jamb_subject_3" id="jamb_subject_3">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>
                                        <!--<input type="text"  name="jamb_subject_3" id="jamb_subject_3" class="form-control" placeholder="Subject">-->
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <div class="form-group ">
                                        <input type="number" max="100" name="jamb_subject_3_score" id="jamb_subject_3_score" class="form-control" placeholder="Score" >
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                         <select class="form-control form-control required styled" name="jamb_subject_4" id="jamb_subject_4">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>
                                        <!--<input type="text" name="jamb_subject_4" id="jamb_subject_4" class="form-control" placeholder="Subject" >-->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="number" max="100" name="jamb_subject_4_score" id="jamb_subject_4_score" class="form-control" placeholder="Score" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="section_title">Credentials & program choice</h2>
                                     <label class="container_radio">Waiting
                                <input type="checkbox"  name="is_waiting" id="is_waiting">
                                <span class="checkmark"></span>
                            </label>
                            <div id="wasceinfo">
                            <div class="form-group add_top_30">
                                <input type="text" name="wasce_number" maxlength="10" minlength="10"  id="wasce_number" class="form-control required" placeholder="WAEC/NECO/NABTEB REGITRATION NO" >
                            </div>

                                                   <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <input type="text" value="English Language" disabled
                                               name="wasce_subject_1" id="wasce_subject_1" class="form-control" placeholder="English Language">
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <div class="form-group ">

                                        <select class="form-control required styled" name="wasce_subject_1_grade" id="wasce_subject_1_grade">
                                            <option value="" selected>Grade</option>
                                             @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                        </select>



                                        <!-- <input type="text" name="wasce_subject_1_grade" value="" id="wasce_subject_1_grade" class="form-control required" placeholder="Grade" > -->
                                    </div>
                                </div>


                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control required styled" name="wasce_subject_2" id="wasce_subject_2">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>

                                        <!-- <input type="text" name="wasce_subject_2" id="wasce_subject_2" class="form-control " placeholder="Subject" > -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">

                                            <select class="form-control required styled" name="wasce_subject_2_grade" id="wasce_subject_2_grade">
                                                <option value="" selected> Grade</option>
                                                 @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                                 @endforeach
                                            </select>


                                            <!-- <input type="text" name="wasce_subject_2_grade" id="wasce_subject_2_grade" class="form-control " placeholder="Grade" > -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control required styled" name="wasce_subject_3" id="wasce_subject_3">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>


                                        <!-- <input type="text"  name="wasce_subject_3" id="wasce_subject_3" class="form-control " placeholder="Subject"> -->
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <div class="form-group ">

                                        <select class="form-control required styled" name="wasce_subject_3_grade" id="wasce_subject_3_grade">
                                            <option value="" selected>Grade</option>
                                             @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                        </select>


                                        <!-- <input type="text" name="wasce_subject_3_grade" id="wasce_subject_3_grade" class="form-control " placeholder="Grade" > -->
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control required styled" name="wasce_subject_4" id="wasce_subject_4">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>


                                        <!-- <input type="text" name="wasce_subject_4" id="wasce_subject_4" class="form-control " placeholder="Subject" > -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">

                                            <select class="form-control required styled" name="wasce_subject_4_grade" id="wasce_subject_4_grade">
                                                <option value="" selected>Grade</option>
                                                 @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                            </select>


                                            <!-- <input type="text" name="wasce_subject_4_grade" id="wasce_subject_4_grade" class="form-control" placeholder="Grade" > -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control required styled" name="wasce_subject_5" id="wasce_subject_5">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>


                                        <!-- <input type="text"  name="wasce_subject_5" id="wasce_subject_5" class="form-control " placeholder="Subject"> -->
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <div class="form-group ">

                                        <select class="form-control required styled" name="wasce_subject_5_grade" id="wasce_subject_5_grade">
                                            <option value="" selected>Grade</option>
                                             @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                        </select>


                                        <!-- <input type="text" name="wasce_subject_5_grade" id="wasce_subject_5_grade" class="form-control " placeholder="Grade" > -->
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control styled" name="wasce_subject_6" id="wasce_subject_6">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>



                                        <!-- <input type="text" name="wasce_subject_6" id="wasce_subject_6" class="form-control " placeholder="Subject" > -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">

                                            <select class="form-control styled" name="wasce_subject_6_grade" id="wasce_subject_6_grade">
                                                <option value="" selected>Grade</option>
                                                 @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                            </select>


                                            <!-- <input type="text" name="wasce_subject_6_grade" id="wasce_subject_6_grade" class="form-control " placeholder="Grade" > -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control styled" name="wasce_subject_7" id="wasce_subject_7">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>



                                        <!-- <input type="text"  name="wasce_subject_7" id="wasce_subject_7" class="form-control " placeholder="Subject"> -->
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <div class="form-group ">

                                        <select class="form-control styled" name="wasce_subject_7_grade" id="wasce_subject_7_grade">
                                            <option value="" selected>Grade</option>
                                             @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                        </select>


                                        <!-- <input type="text" name="wasce_subject_7_grade" id="wasce_subject_7_grade" class="form-control " placeholder="Grade" > -->
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control styled" name="wasce_subject_8" id="wasce_subject_8">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>



                                        <!-- <input type="text" name="wasce_subject_8" id="wasce_subject_8" class="form-control " placeholder="Subject" > -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">

                                            <select class="form-control styled" name="wasce_subject_8_grade" id="wasce_subject_8_grade">
                                                <option value="" selected>Grade</option>
                                                 @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                            </select>


                                            <!-- <input type="text" name="wasce_subject_8_grade" id="wasce_subject_8_grade" class="form-control " placeholder="Grade" > -->
                                        </div>
                                    </div>
                                </div>


                                <!-- New TWO Subject sub -->
                                <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control styled" name="wasce_subject_9" id="wasce_subject_9">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>



                                        <!-- <input type="text" name="wasce_subject_8" id="wasce_subject_8" class="form-control " placeholder="Subject" > -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">

                                            <select class="form-control styled" name="wasce_subject_9_grade" id="wasce_subject_9_grade">
                                                <option value="" selected>Grade</option>
                                                 @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                            </select>


                                            <!-- <input type="text" name="wasce_subject_9_grade" id="wasce_subject_9_grade" class="form-control " placeholder="Grade" > -->
                                        </div>
                                    </div>
                                </div>

</div>
                               {{-- <div class="col-md-4 ">
                                    <div class="form-group ">

                                        <select class="form-control form-control styled" name="wasce_subject_10" id="wasce_subject_10">
                                            <option value="" selected>Choose Subeject </option>
                                            @foreach($book as $c)
                                                <option value="{{$c->book_code}}" >{{$c->book_name}}</option>
                                            @endforeach
                                        </select>



                                        <!-- <input type="text" name="wasce_subject_8" id="wasce_subject_8" class="form-control " placeholder="Subject" > -->
                                    </div>
                                </div>
                             <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-group ">

                                            <select class="form-control styled" name="wasce_subject_10_grade" id="wasce_subject_10_grade">
                                                <option value="" selected>Grade</option>
                                                 @foreach($grade as $c)
                                                <option value="{{$c->grade_code}}" >{{$c->grade_name}}</option>
                                            @endforeach
                                            </select>


                                            <!-- <input type="text" name="wasce_subject_10_grade" id="wasce_subject_10_grade" class="form-control " placeholder="Grade" > -->
                                        </div>
                                    </div>
                                </div>
                               --}}
                                <!-- end new subject  -->
                            </div>

                            <div class="row">

                                <!--<div class="alert-message alert-message-info" >-->
                                <!--    <h4> Notice !</h4>-->
                                <!--    <p>-->
                                <!--        Admission quota for Medicine and Public and International Law for this 2020/2021 session is full.-->
                                <!--    </p>-->
                                <!--</div>-->



                                <div class="col-md-6">
                                    <h5>Department</h5>
                                    <div class="form-group">
                                        <select class="form-control required styled" id="first_choice" name="first_choice">
                                            <option value="">Select Department</option>
                                             @foreach($subject as $c)
                                                <option value="{{$c->subject_code}}" >{{$c->subject_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Programme</h5>
                                    <div class="form-group">
                                        <select class="form-control required styled" id="second_choice" name="second_choice">
                                            <option value="">Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /step-->
                        <!-- /Start Branch ============================== -->
                        <div class="step" data-state="branchtype">
                            <h2 class="section_title">Educational Data</h2>
                            <h3 class="main_question">Select Admission Type</h3>
                            <div class="form-group">
                                <label class="container_radio version_2">Freshmen (UTME)
                                    <input type="radio" name="method_of_application" value="Freshmen" class="required" id="method_of_applicationFreshmen">
                                    <span class="checkmark"></span>
                                </label>
                            <label class="container_radio version_2">Transfer
                                    <input type="radio" name="method_of_application" value="Transfer" class="required" id="method_of_applicationTransfer">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Direct Entry (DE)
                                    <input type="radio" name="method_of_application" value="DE" class="required" id="method_of_applicationTransfer">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <!-- /Freshman ============================== -->
                        <div class="branch" id="Freshmen">
                            <div class="step" data-state="end">
                                <h2 class="section_title">Freshman(UTME)</h2>
                                <div class="row ">
                                    <div class="col-md-6 ">
                                      <div class="form-group ">
                                            <select class="form-control required styled select2" id="secondary_school_name" name="secondary_school_name">
                                                <option value="">Secondary School</option>

                                                @foreach($school as $c)
                                                    <option value="{{$c->school_code}}" >{{$c->school_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <input type="text" name="secondary_school_name_other" value="" id="secondary_school_name_other" class="form-control" placeholder="Enter School Name if not on the secondary list" >
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group ">
                                                <input type="text" name="secondary_school_year" value="" id="secondary_school_year" class="form-control required number" placeholder="Year of graduation e.g 2020" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /step-->

                        <!-- /Transfer ============================== -->
                        <div class="branch" id="Transfer">
                            <div class="step" data-state="end">
                                <h2 class="section_title">Transfer</h2>

                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <select class="form-control required styled select2" id="transfer_uni_school_name" name="transfer_uni_school_name">
                                                <option value="">Select School</option>
                                                @foreach($school as $c)
                                                    <option value="{{$c->school_code}}" >{{$c->school_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <input type="text" name="transfer_uni_school_name_other" value="" id="transfer_uni_school_name_other" class="form-control" placeholder="Enter School name if not on the list" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group ">
                                                <input type="text" name="transfer_uni_school_program" value="" id="transfer_uni_school_program" class="form-control required" placeholder="Programme of Study" >

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <select class="form-control required styled" id="transfer_university_level" name="transfer_university_level">
                                                <option value="">Level</option>
                                                <option value="2">200</option>
                                                <option value="3">300</option>
                                                <option value="4">400</option>
                                                <option value="5">500</option>
                                                <option value="6">600</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control required styled" id="transfer_university_year" name="transfer_university_year">
                                                <option value="">Year</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /step-->
                         <!-- /DE ============================== -->
                         <div class="branch" id="DE">
                            <div class="step" data-state="end">
                                <h2 class="section_title">Direct Entry (DE)</h2>

                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <select class="form-control required styled select2" id="transfer_uni_school_name" name="transfer_uni_school_name">
                                                <option value="">Select School</option>
                                                @foreach($school as $c)
                                                    <option value="{{$c->school_code}}" >{{$c->school_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <input type="text" name="transfer_uni_school_name_other" value="" id="transfer_uni_school_name_other" class="form-control" placeholder="Enter School name if not on the list" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group ">
                                                <input type="text" name="transfer_uni_school_program" value="" id="transfer_uni_school_program" class="form-control required" placeholder="Programme of Study" >

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <select class="form-control required styled" id="transfer_university_level" name="transfer_university_level">
                                                <option value="">Level</option>
                                                <option value="2">200</option>
                                                <option value="3">300</option>
                                                <option value="4">400</option>
                                                <option value="5">500</option>
                                                <option value="6">600</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control required styled" id="transfer_university_year" name="transfer_university_year">
                                                <option value="">Year</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /step end-->

                        <div class="submit step" id="end">
                            <h2 class="section_title"> Survey</h2>
                            <h3 class="main_question">How did you get know about our university?</h3>
                            <div class="form-group">
                                <label class="container_radio version_2">Advertisement on Newspaper
                                    <input type="radio" name="how_do_you_hear_about_nun" value="1" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Advertisement on Radio
                                    <input type="radio" name="how_do_you_hear_about_nun" value="3" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Advertisement on Television
                                    <input type="radio" name="how_do_you_hear_about_nun" value="2" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Friends
                                    <input type="radio" name="how_do_you_hear_about_nun" value="6" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Billboard
                                    <input type="radio" name="how_do_you_hear_about_nun" value="11" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">University Website
                                    <input type="radio" name="how_do_you_hear_about_nun" value="8" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Social Media
                                    <input type="radio" name="how_do_you_hear_about_nun" value="9" class="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio version_2">Visit to Khadija Unversity
                                    <input type="radio" name="how_do_you_hear_about_nun" value="13" class="required">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="container_radio version_2">Other
                                    <input type="radio" name="how_do_you_hear_about_nun" value="14" class="required">
                                    <span class="checkmark"></span>
                                </label>

                            </div>
                            <div class="summary">
                                <div class="wrapper">
                                    I heareby confirm that the information I have provided on this form is true, complete and accurate, and that if the University discovers contrary, I will be held liable accoriding to the University Disciplinary Code of Conduct Regulation.
                                </div>
                                <div class="text-center">
                                    <div class="form-group terms">
                                        <label class="container_check">Confirm
                                            <input type="checkbox" name="terms" value="Yes" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /step last-->

                    </div>
                    <!-- /middle-wizard -->

                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">Prev</button>
                        <button type="button" name="forward" class="forward">Next</button>
                        <button type="submit" name="process" class="submit" id="sbtn">Submit</button>
                    </div>
                    <!-- /bottom-wizard -->
                </form>
            </div>
            @endif
            <!-- /Wizard container -->
        </div>
        <!-- /content-right-->
    </div>
    <!-- /row-->
</div>




<!-- Scripts -->

<script src="{{asset('frontend/assets/js/jquery.min.js')}}" ></script>
<script src="{{asset('frontend/assets/js/login/common_scripts.min.js')}}" ></script>
<script src="{{asset('frontend/assets/js/login/velocity.min.js')}}" ></script>
<script src="{{asset('frontend/assets/js/login/common_functions.js')}}" ></script>
<script src="{{asset('frontend/assets/js/login/flatpickr.js')}}"></script>


<script>
    $("#dob").flatpickr();
</script>



<script src="{{asset('frontend/assets/js/login/func_2.js')}}" defer></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('custom/js/frontend.js')}}"></script>

<script>
    $('#is_waiting').click(function() {
        if ($(this).is(':checked')) {
            ChangeStatus(0);
        }else{
            ChangeStatus(1);
        }
    })

    function ChangeStatus(status) {
        if(status == 1){
            $('#wasce_subject_1_grade').val('').addClass('required');
            $('#wasce_subject_2_grade').val('').addClass('required');
            $('#wasce_subject_3_grade').val('').addClass('required');
            $('#wasce_subject_4_grade').val('').addClass('required');
            $('#wasce_subject_5_grade').val('').addClass('required');
            $('#wasce_subject_6_grade').val('').addClass('required');
            $('#wasce_subject_7_grade').val('').addClass('required');
            $('#wasce_subject_8_grade').val('').addClass('required');
            $('#wasce_subject_9_grade').val('').addClass('required');
            $('#wasce_subject_1').val('').addClass('required');
            $('#wasce_subject_2').val('').addClass('required');
            $('#wasce_subject_3').val('').addClass('required');
            $('#wasce_subject_4').val('').addClass('required');
            $('#wasce_subject_5').val('').addClass('required');
            $('#wasce_subject_6').val('').val('').addClass('required');
            $('#wasce_subject_7').val('').val('').addClass('required');
            $('#wasce_subject_8').val('').val('').addClass('required');
            $('#wasce_subject_9').val('').val('').addClass('required');
            $('#wasce_number').val('').addClass('required');


            $('#wasceinfo').css({display: "block"});
        }else {
            $('#wasce_subject_1_grade').val('').removeClass('required');
            $('#wasce_subject_2_grade').val('').removeClass('required');
            $('#wasce_subject_3_grade').val('').removeClass('required');
            $('#wasce_subject_4_grade').val('').removeClass('required');
            $('#wasce_subject_5_grade').val('').removeClass('required');
            $('#wasce_subject_6_grade').val('').removeClass('required');
            $('#wasce_subject_7_grade').val('').removeClass('required');
            $('#wasce_subject_8_grade').val('').removeClass('required');
            $('#wasce_subject_9_grade').val('').removeClass('required');
            $('#wasce_subject_1').val('').removeClass('required');
            $('#wasce_subject_2').val('').removeClass('required');
            $('#wasce_subject_3').val('').removeClass('required');
            $('#wasce_subject_4').val('').removeClass('required');
            $('#wasce_subject_5').val('').removeClass('required');
            $('#wasce_subject_6').val('').removeClass('required');
            $('#wasce_subject_7').val('').removeClass('required');
            $('#wasce_subject_8').val('').removeClass('required');
            $('#wasce_subject_9').val('').removeClass('required');
            $('#wasce_number').val('').removeClass('required');
            $('#wasceinfo').css({display: "none"});
        }

    }
</script>
</body>
</html>
