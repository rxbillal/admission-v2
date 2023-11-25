@extends('app.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">JAMB</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{'/dashboard'}}">Home</a></li>
                            <li class="breadcrumb-item active">JAMB</li>
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
                                JAMB List
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col">
                                     <form class="form-inline" action="{{url('import')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                         <div class="form-group mb-2">
                                             <label for="exampleFormControlFile1">Jump Excel File</label>
                                             <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                                         </div>
                                         <button type="submit" class="btn btn-primary mb-2">Upload and Update</button>
                                     </form>
                                 </div>
                             </div>
                             <table class="table table-bordered table-responsive-sm w-100  table-sm" id="jamb_list">
                                 <thead>
                                 <tr>
                                     <th>Jamb ID</th>
                                     <th>Subject 1</th>
                                     <th>Subject 2</th>
                                     <th>Subject 3</th>
                                     <th>Subject 4</th>
                                     <th>Total</th>
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
