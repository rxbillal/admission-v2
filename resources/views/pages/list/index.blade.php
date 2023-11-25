@extends('app.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Application</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{'/dashboard'}}">Home</a></li>
                            <li class="breadcrumb-item active">Application</li>
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
                   {{--   <div class="card">
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
                      </div>--}}
                     <div class="card">
                         <div class="card-header">
                             <div class="card-title">
                                Application List
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-3">
                                     <div class="form-group">
                                         <label><strong>Filter(Payment Status) :</strong></label>
                                         <select id='pay_status' class="form-control" style="width: 200px">
                                             <option value="">All</option>
                                             <option value="1">Paid</option>
                                             <option value="0">Unpaid</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <label><strong>Filter(Form Status) :</strong></label>
                                         <select id='form_status' class="form-control" style="width: 200px">
                                             <option value="">All</option>
                                             <option value="1">Applied</option>
                                             <option value="0">Not Applied</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <label><strong>Filter(Application Status) :</strong></label>
                                         <select id='app_status' class="form-control" style="width: 200px">
                                             <option value="">All</option>
                                             <option value="1">Admitted</option>
                                             <option value="0">Not Admitted</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-3"></div>
                             </div>


                             <table class="table table-bordered table-responsive-sm w-100  table-sm" id="user_list">
                                 <thead>
                                 <tr>
                                     <th width="5%">No</th>
                                     <th width="15%">Application ID</th>
                                     <th  width="25%">Name</th>
                                     <th  width="25%">Email</th>
                                     <th width="10%">Application</th>
                                     <th width="10%">Admission</th>
                                    {{-- <th>Payment</th>--}}
                                     <th width="10%">Action</th>
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
