@extends('app.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Student Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{'/dashboard'}}">Home</a></li>
                            <li class="breadcrumb-item active">Student Report</li>
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
                  <div class="col-12">
                     {{-- <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <label><strong>Filter :</strong></label>
                                  <select id='status' class="form-control" style="width: 200px">
                                      <option value="">All</option>
                                      <option value="1">Paid</option>
                                      <option value="0">Unpaid</option>
                                  </select>
                              </div>
                          </div>
                      </div> --}}
                     <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card-title">
                                        Student Report
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <form action="{{ route('export-pdf') }}">
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            {{-- <a href="{{ route('export-pdf') }}"> --}}
                                                PDF
                                            {{-- </a> --}}
                                        </button>
                                    {{-- </form>yssss --}}
                                    <button type="button"  name="action" value="excel" class="btn btn-sm btn-primary">Excel</button>
                                </div>
                            </div>
                        </div>
                         {{-- <form action="{{url('student-report-export')}}" method="post">
                             @csrf --}}
                             {{-- <div class="card-header">
                                 <div class="row">
                                     <div class="col-8">
                                         <div class="card-title">
                                             Student Report
                                         </div>
                                     </div>
                                     <div class="col-4 text-right">
                                         <button type="submit"  name="action" value="pdf" class="btn btn-sm btn-warning">PDF</button>
                                         <button type="submit"  name="action" value="excel" class="btn btn-sm btn-primary">Excel</button>
                                     </div>
                                 </div>
                             </div> --}}
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-3">
                                         <div class="form-group">
                                             <label><strong>Filter(Department) :</strong></label>
                                             <select id='department' name="department" class="form-control">
                                                 <option value="0">Select Department</option>
                                                 @foreach($departments as $d)
                                                     <option value="{{$d->id}}">{{$d->subject_name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-3">
                                         <div class="form-group">
                                             <label><strong>Filter(Programme) :</strong></label>
                                             <select id='subject' name="subject" class="form-control" >
                                                 <option value="0">Select Subject</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-3">
                                         <div class="form-group">
                                             <label><strong>Filter(Start Date) :</strong></label>
                                             <input class="form-control" id="start_date" name="start_date" type="date">
                                         </div>
                                     </div>
                                     <div class="col-3">
                                         <div class="form-group">
                                             <label><strong>Filter(End Date) :</strong></label>
                                             <input class="form-control" id="end_date" name="end_date" type="date">
                                         </div>
                                     </div>
                                     <div class="col-3">
                                         <div class="form-group">
                                             <label><strong>Filter(State) :</strong></label>
                                             <select id='state' name="state" class="form-control" >
                                                 <option value="0">Select State</option>
                                                 @foreach($states as $d)
                                                     <option value="{{$d->city_code}}">{{$d->city_name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                         </form>
                             <table class="table table-bordered table-responsive-sm w-100 report table-sm" id="report">
                                 <thead>
                                    <tr>
                                        <th  width="5%">No</th>
                                        <th  width="20%">Applicant id</th>
                                        <th  width="15%">Full Name</th>
                                        <th  width="15%">Email</th>
                                        <th  width="15%">Phone</th>
                                        <th  width="15%">Subject</th>
                                        <th  width="15%">State</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                             </table>

                         </div>
                     </div>
                  </div>
              </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
