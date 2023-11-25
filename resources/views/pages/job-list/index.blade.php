@extends('app.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Application</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{'/dashboard'}}">Home</a></li>
                            <li class="breadcrumb-item active">Job Application</li>
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

                     <div class="card">
                         <div class="card-header">
                             <div class="card-title">
                                Job Application List
                             </div>
                         </div>
                         <div class="card-body">
                          <div class="row">
                              <div class="col-3">
                                  <div class="form-group">
                                      <label><strong>Filter (Job Type) :</strong></label>
                                      <select id='job_type' class="form-control" style="width: 200px">
                                          <option value="">All</option>
                                          <option value="1">Academic</option>
                                          <option value="2">Non-Academic</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-3">
                                  <div class="form-group">
                                      <label><strong>Filter (Faculty) :</strong></label>
                                      <select id='faculty' class="form-control" style="width: 200px">
                                          <option value="">All</option>
                                          @foreach($faculty as $f)
                                              <option value="{{$f->id}}">{{$f->fac_title}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="col-3">
                                  <div class="form-group">
                                      <label><strong>Filter (Department) :</strong></label>
                                      <select id='department' class="form-control" style="width: 200px">
                                          <option value="">All</option>

                                      </select>
                                  </div>
                              </div>
                              <div class="col-3">
                                  <div class="form-group">
                                      <label><strong>Filter (Course) :</strong></label>
                                      <select id='course' class="form-control" style="width: 200px">
                                          <option value="">All</option>
                                          @foreach($job as $j)
                                              <option value="{{$j->id}}">{{$j->job_title}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>
                             <table class="table table-bordered table-responsive-sm w-100  table-sm" id="job_list">
                                 <thead>
                                 <tr>

                                    <!-- <th>Application ID</th>-->
                                     <th>Name</th>
                                     <th>Phone</th>
                                     <th>Email</th>
                                    {{-- <th>Type</th>--}}
                                     <th>Position</th>
                                     <th>CV</th>
                                     <th>Action</th>
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
