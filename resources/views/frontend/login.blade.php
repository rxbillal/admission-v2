<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="Khadija University Majia - Admission Application"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Admission Process</title>
    <!-- google font -->
    <style type="text/css">
        h6 {
            border-bottom: 1px solid rgb(200, 200, 200);
        }
    </style>

    <link
        href=" 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all' "
        rel="stylesheet"
        type="text/css"
    />
    <!-- icons -->

    <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="{{asset('frontend/assets/css/login2/material-design-iconic-font.min.css')}}"
    />
    <!-- bootstrap -->
    <link
        href="{{asset('frontend/assets/css/bootstrap.min.css')}}"
        rel="stylesheet"
        type="text/css"
    />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/login2/extra_pages.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/login2/customStyle.css')}}"/>
    <link href="{{asset('plugins/toastr/toastr.css')}}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}"/>
</head>

<body>
<div class="limiter">
    <div class="container-login100 bg_ab">
        <div class="wrap-login100">

            <form {{--id="user_login"--}} action="{{url('user-login-check')}}" method="post">
                @csrf
            <span class="" style="display: flex; justify-content: center;">
              <img alt="" src="{{asset('frontend/assets/images/logo.png')}}" style="width: 80%"/>
            </span>
                <span class="login100-form-title p-t-27"> Login </span>
                <p
                    style="
                color: #276c2a;
                padding-bottom: 20px;
                font-size: 16px;
                text-align: center;
              "
                >
                    Application for Admission
                </p>

                <b style="color: red"> </b>

                <input
                    class="i_ab_style"
                    type="email"
                    name="email"
                    placeholder="Username"
                    required_id="id_login"
                />
                <input
                    class="i_ab_style"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required_id="id_password"
                />
                <p style="text-align: center; color: red;"><?php if (isset($msg)) {
                        echo $msg;
                    } ?></p>
                <div style="float: left">

                    <input
                        type="submit"
                        name="LogIn"
                        value="LOGIN"
                        id="Login"
                        class="s_ab"
                    />
                </div>
               <a class="txt1" style="color: #1d4ca1" href="{{url('forgot')}}">
                    Forgot Password?
                </a>
                <div>

                    <br/>
                </div>
                @if($errors->any())
                    <h6 class="text-center text-danger">{{$errors->first()}}</h6>
                @endif
            </form>

            <div>
                <ul class="u_ab">
                    <li class="li_ab">
                        <a class="a_ab" href="{{url('/')}}"
                        ><i class="fa fa-home i_ab" aria-hidden="true"></i
                            ><strong>Go to Home</strong
                            ><span class="s2_ab">KUM Main</span></a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('frontend/assets/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('custom/js/frontend.js')}}"></script>
<!-- <script src="../assets/js/pages/extra-pages/pages.js"></script> -->
<!-- end js include path -->
</body>
</html>
