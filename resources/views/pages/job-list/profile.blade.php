@extends('app.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{'dashboard'}}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if($user->gender == '2')
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('dist/img/pb.png')}}"
                                         alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{asset('dist/img/pf.png')}}"
                                             alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{$user->first_name}} {{$user->last_name}}</h3>

                            {{--    <p class="text-muted text-center">Software Engineer</p>
--}}
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Payment Status</b> <a class="float-right">
                                            @if($user->payment == 0)
                                                <button type="button" class="btn btn-sm btn-danger">
                                                    Unpaid
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-success">
                                                    Paid <span class="badge  badge-light"></span>
                                                </button>
                                            @endif
                                        </a>
                                    </li>
                                </ul>

                                @if($user->is_approve == 0)
                                    <form id="approve_submit">
                                    <div class="form-check">
                                       <label class="form-check-label" for="select_subject1">
                                            {{\App\Models\Subject::where('subject_code',$user->first_c)->first()->subject_name}}
                                           <br>({{\App\Models\sub::where('id',$user->second_c)->first()->sub_name}})
                                        </label>
                                    </div>

                                        <div class="form-group">
                                            <select class="form-control required styled" id="select_subject" name="select_subject">
                                                <option value="">Select</option>
                                                @foreach($subject->unique('sub_name') as $c)
                                                    <option value="{{$c->sub_name}}" @if($user->second_c == $c->id) selected @endif>{{$c->sub_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <input type="hidden" id="id" name="id" value="{{$id}}">
                                    <button type="submit" class="btn btn-primary btn-block mt-3"><b id="tt">Approve</b></button>
                                    </form>
                                @else
                                    <p>{{$user->admitted_subject}}</p>
                                    <button class="btn btn-success btn-block mt-3">Approved</button>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#kin"
                                                            data-toggle="tab">Kin</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#jamb"
                                                            data-toggle="tab">JAMB</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#waec"
                                                            data-toggle="tab">WAEC/NECO/NABTEB</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#choice"
                                                            data-toggle="tab">Choice</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#edu"
                                                            data-toggle="tab">Education</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#ser"
                                                            data-toggle="tab">Survey</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="personal">
                                        <table class="table small">
                                            <tr>
                                                <th style="width: 20%">Fisrt Name</th>
                                                <td>{{$user->first_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Last Name</th>
                                                <td>{{$user->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Gender</th>
                                                <td>
                                                    @if($user->gender == 1)
                                                        Female
                                                    @else
                                                        Male
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Birth Date</th>
                                                <td>{{$user->b_date}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Blood Group</th>
                                                <td>{{\App\Models\Blood::where('blood_code',$user->blood)->first()->blood_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Marital Status</th>
                                                <td>{{$user->marital_status}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Email</th>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Phone</th>
                                                <td>{{$user->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Nationality</th>
                                                <td>{{\App\Models\Country::where('country_code',$user->country)->first()->country_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Address</th>
                                                <td>{{$user->address}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Country</th>
                                                <td>{{\App\Models\Country::where('country_code',$user->country)->first()->country_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">City</th>
                                                <td>{{\App\Models\City::where('city_code',$user->state)->first()->city_name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="kin">
                                        <table class="table small">
                                            <tr>
                                                <th style="width: 20%">First Name</th>
                                                <td>{{$user->k_first_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Last Name</th>
                                                <td>{{$user->k_last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Relation</th>
                                                <td>{{\App\Models\Relation::where('relation_code',$user->relation)->first()->relation_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Occupation</th>
                                                <td>{{$user->occupation}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Address</th>
                                                <td>{{$user->k_address}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Phone</th>
                                                <td>{{$user->k_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Email</th>
                                                <td>{{$user->k_email}}</td>
                                            </tr>
                                        </table>

                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="jamb">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h6>Registration No: <span>{{$user->j_no}}</span></h6>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table small w-100">
                                                    <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Score</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$user->j_eng_subject}}</td>
                                                        <td>{{$user->j_eng_score}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$user->j_subject1}}</td>
                                                        <td>{{$user->j_subject1_score}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$user->j_subject2}}</td>
                                                        <td>{{$user->j_subject2_score}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$user->j_subject3}}</td>
                                                        <td>{{$user->j_subject3_score}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="waec">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h6>Registration No: <span>{{$user->w_no}}</span></h6>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table small w-100">
                                                    <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Score</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$user->j_eng_subject}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_eng_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject1)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject1_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject2)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject2_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject3)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject3_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject4)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject4_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject5)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject5_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject6)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject6_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject7)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject7_score)->first()->grade_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\App\Models\Book::where('book_code',$user->w_subject8)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject8_score)->first()->grade_name}}</td>
                                                    </tr>
                                                   {{-- <tr>
                                                        <td>{{dd($user)}}{{\App\Models\Book::where('book_code',$user->w_subject9)->first()->book_name}}</td>
                                                        <td>{{\App\Models\Grade::where('grade_code',$user->w_subject9_score)->first()->grade_name}}</td>
                                                    </tr>--}}

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="choice">
                                        <table class="table small w-100">
                                            <tr>
                                                <th style="width: 20%">Department</th>
                                                <td>{{\App\Models\Subject::where('subject_code',$user->first_c)->first()->subject_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Programme</th>
                                                <td>{{\App\Models\sub::where('id',$user->second_c)->first()->sub_name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="edu">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h6>Admission Type: <span>{{$user->type}}</span></h6>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table small w-100">
                                                    <thead>
                                                    <tr>
                                                        <th>School</th>
                                                        <th>Year</th>
                                                       {{-- <th>Studay</th>
                                                        <th>Level</th>--}}
                                                    </tr>
                                                    </thead>
                                                    @if($user->type == "Freshmen")
                                                    <tbody>
                                                    <tr>
                                                        <th>
                                                            @if($user->f_school)
                                                                {{\App\Models\School::where('school_code',$user->f_school)->first()->school_name}}
                                                            @else
                                                                {{$user->f_other}}
                                                            @endif
                                                         </th>
                                                        <th>{{$user->f_year}}</th>
                                                        <th></th>
                                                    </tr>

                                                    </tbody>
                                                    @else
                                                    <tbody>
                                                    <th>
                                                        @if($user->t_school)
                                                            {{\App\Models\School::where('school_code',$user->t_school)->first()->school_name}}
                                                        @else
                                                            {{$user->t_other}}
                                                        @endif
                                                    </th>
                                                    <th>{{$user->t_year}}</th>
                                                   {{-- <th>{{$user->t_study}}</th>
                                                    <th>{{$user->t_level}}</th>--}}
                                                    </tbody>
                                                    @endif
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ser">
                                        <div class="card">
                                            <table class="table small w-100">

                                                <tr>
                                                    <th>Knowing Platform</th>
                                                    <th>{{\App\Models\Survey::where('survey_code',$user->survey_type)->first()->survey_name}}</th>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
