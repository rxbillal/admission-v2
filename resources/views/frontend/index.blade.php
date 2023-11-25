<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->

    <title>Khadija University Majia - Online Admission Application form </title>
    <meta name="keywords" content="khadija">
    <meta name="description"
          content="This program prepares students equally well for graduate work or professional positions in the computing and information technology fields and provides a concentrated approach to computer science, while encourages students to combine computer science with studies in another field.">

    <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/meanmenu.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/aos.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/toastr/toastr.css')}}" rel="stylesheet">

    <!-- fonts -->
    <link href="https://application.nileuniversity.edu.ng/fonts/ep-icon-fonts/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Custom Stylesheet -->
    <link href="{{asset('frontend/assets/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/added.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/newlyapprovedcourse.css')}}" rel="stylesheet">

    <style>

        .header-btns .btn-link {
            background: #009735;
        }

        .notice__container {
            background-color: #009735;
        }

        .hero-media h3 {
            color: #009735;
        }

        .btn--blue {
            background-color: #009735;
        }

        .btn--blue:hover {
            background-color: rgb(61, 247, 9);
        }

        a:hover {
            color: #184227;
        }

        .faq-section {
            background-color: #009735;
        }

        .single-faq .faq-head.collapsed {
            border-color: #657CAC;
            background-color: #184227;
        }

        .footer-section {
            padding-top: 20px;
            background: #184227 0% 0% no-repeat padding-box;
            padding-bottom: 30px;
            color: #fff;
        }
    </style>

</head>
<body>
<div class="site-wrapper">
    <!-- Header Starts -->
    <header class="site-header position-relative">
        <div class="container">
            <div class="row justify-content-center align-items-center position-relative">
                <div class="col-sm-3 col-6 col-lg-3 col-xl-3 order-lg-1">
                    <!-- Brand Logo -->
                    <div class="brand-logo">
                        <a href="{{url('/')}}"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="kum" width="413px"/></a>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-2 col-xl-2 d-none d-sm-block order-lg-3">
                    <div class="header-btns justify-content-end">
                        <a href="{{url('login')}}" class="btn btn-link" style="color: white">Login</a>

                    </div>
                </div>
                <!-- Menu Block -->
                <div class="col-sm-1 col-6 col-lg-5 col-xl-5 offset-lg-2  position-static order-lg-2">
                    <div class="main-navigation">
                        <ul class="main-menu" style="display: none;">
                            <li>
                                <a href="{{url('login')}}"> Login</a>
                            </li>

                        </ul>
                    </div>
                    <div class="mobile-menu">

                    </div>
                </div>

            </div>
        </div>
        <div class="shape-holder header-shape" data-aos="fade-down" data-aos-once="true"><img
                src="{{asset('forntend/assets/images/Path 6.svg')}}" alt=""></div>

    </header>
    <!-- Hero-Area -->

    <div class="hero-banner position-relative">
        <div class="container">
            <div class="hero-image" style="background-image: url('{{asset('frontend/assets/images/g.jpg')}}')">
                <div class="hero-title">
                    <h1>Study at Khadija University Majia </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Notice -->
    <!-- Notice -->
    <div class="container">
        <div class="row notice">
            <div class="col">
                <div class="d-flex notice__container align-items-center px-2 py-3 p-lg-4 mt-3">
                    <!--<img class="mr-3 mr-lg-5" src="https://res.cloudinary.com/drl8a4xzt/image/upload/v1599143791/Icon-awesome-star_fjuhuj.svg" alt="star icon">-->
                    <h4> Application for Admission 2023/2024 Session</h4>

                </div>
            </div>
        </div>
    </div>

    <!-- Hero-Area -->
    <div class="hero-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-7 col-12">
                    <div class="hero-content">
                          <ol type="I">
                        
                <strong> Kindly follow the following steps to complete the application for Admission into Khadija University Majia</strong>
                <li>Follow the steps and create an account using valid email address</li>
                <li>Login back to your application form using the email and password created</li>
                
                <li>Fill in all the fields on the displayed application form to the final step and Submit</li>
              <li>log in back to your application dashboard for the admission decision</li>
	           <li>or check your  registered email address for admission decisions.</li>
</ol>

<P>For admission enquiry contact:  <a href="mailto: admissions@kum.edu.ng style="color:#FF0000;" > admissions@kum.edu.ng</a>  or call 08135321431,08069353369
</P>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-4 col-12">

                    <div id="app" class="hero-media">


                        <h3>Create an Account </h3>

                        <p class="text-center txt-primary">Use your valid email address, password to create an account
                            and click on login for the next steps of the application process for admission into KUM
                            .</P>
                        <p class="text-center txt-primary"></P>

                        <form id="reg_form">
                           @csrf
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control"   name='first_name'
                                           id="first_name" placeholder="First name">

                                </div>
                                <div class="col">
                                    <input type="text" class="form-control"   name='last_name'
                                           id="last_name" placeholder="Last name">

                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="email" name='email' id="email" class="form-control"
                                           placeholder="Email Address">

                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name='phone_number' id="phone_number"
                                           placeholder="Phone number">

                                </div>

                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="password" name='password' id="pass" class="form-control"
                                           placeholder="Enter password">

                                </div>
                                <div class="col">
                                    <input type="password" name='confirm_password' id="pass2" class="form-control"
                                           placeholder="Confirm password">

                                </div>

                            </div>
                            <div class="col text-center">
                                <div class="alert-message alert-message-success d-none" id="alertS" >
                                    <h4>Your account has been successfully created</h4>
                                    <p>

                                        <a href="{{url('login')}}">
                                            Click Here To Continue</a>
                                    </p>
                                </div>


                                <button class="btn btn--blue btn--hover-shine" type="submit">
                                    Create an Account
                                </button>
                            </div>

                        </form>
                        <p class="text-center pt-3 text-success">Already have an account? <a href="{{url('login')}}">Click here
                                to Continue with your Application </a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- FAQ Section -->
    <section class="faq-section position-relative">
        <div class="container">
            <!-- faq accordionExample -->
            <div class="faq-accordion">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title"><h2>General admission process and requirements</h2></div>

                        <div class="accordion faq-accordion space-db--10" id="accordionExample2">
                            <div class="single-faq mb--10" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-once="true">
                                <button class="faq-head" type="button" data-toggle="collapse" data-target="#faq1"
                                        aria-expanded="true" aria-controls="faq1">
                                    <h2>
UNDERGRADUATE PROGRAMMES 
ADMISSION REQUIREMENTS 2023/2024 SESSION</h2>
                                    <i class="fas fa-chevron-down    "></i>
                                </button>

                                <div id="faq1" class="collapse show" aria-labelledby="faq-heading1"
                                     data-parent="#accordionExample2">
                                    <div class="faq-body">
                                        <p>
                                            The admission requirements into the undergraduate programmes of KHADIJA University, Majia shall be as follows: 
                                        
                                        </p>
                                        <p>
                                      <ol type="I">
                                      <li>Admission into the university shall be open to all irrespective of religion, ethnic group, gender, creed and disability; </li>
                                      <li>All admissions into the university shall be through the Joint Admissions and Matriculation Board (JAMB); </li>
                                      <li>For admission to 100 Level, candidates must: obtain five (5) credits at SSCE (or equivalent) in relevant subjects at not more than 2 sittings including credit passes in English and Mathematics; and attain acceptable points in Unified Tertiary Matriculation Examination (UTME) in relevant subjects; </li>
                                       <li>For admission by Direct Entry (200 Level), candidates shall, in addition to having five (5) SSCE credits, obtain at least two (2) A' level (or its equivalent) passes in relevant subjects, or possess ND with credit passes, or possess a good first degree in another field as the case may be; </li>
                                        <li>Credit passes in English Language and Mathematics shall be compulsory for admission into all courses; </li>
                                         <li>Those who meet the requirements for admission shall be subjected to screening interview to be conducted by the university; and </li>
                                          <li>The university shall not accept transfer students until after the first two years of its existence. </li>
                                          
                                    </ol>
                                    <b>Note :Candidates must, in addition to meeting the general admission requirements, also satisfy the Faculty and departmental requirements
                                    </b>
                                        </p>
                                   
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>


     </div>
    </section>


    <!-- Footer Section -->
    <div class="footer-section ">
        <div class="container margin-decrese">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8 col-xl-7">
                    <div class="footer-content">
                        <p class="copy"><a href="#" target="_blank"> © <?php $year = date("Y");echo $year;?> Khadija University of Nigeria </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/assets/js/bootstrap.bundle.js')}}"></script>


        <!-- Plugins JS -->
        <script src="{{asset('frontend/assets/js/jquery.meanmenu.js')}}" ></script>
        <script src="{{asset('frontend/assets/js/slick.min.js')}}" ></script>
        <script src="{{asset('frontend/assets/js/jquery.fancybox.min.js')}}" ></script>
        <script src="{{asset('frontend/assets/js/aos.js')}}"></script>
        <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
        <!-- Custom JS -->

        <script src="{{asset('frontend/assets/js/active.js')}}" ></script>
        <script src="{{asset('frontend/assets/js/main.js')}}" ></script>
        <script src="{{asset('custom/js/reg.js')}}"></script>

        <script>

            $(document).on('scroll', function () {


                if ($(window).scrollTop() > 30) {
                    $('.shape-holder img').css({
                        'filter': 'saturate(3)'
                    });
                }
            });


        </script>


</body>
</html>
