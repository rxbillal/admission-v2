
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('plugins/dt/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/dt/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!--Toaster-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




@switch(Request::segment(1))
    @case('list')
    <script>
        $(function () {
            var table =  $("#user_list").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('list.index') }}",
                    data: function (d) {
                            d.pay_status = $('#pay_status').val(),
                            d.form_status = $('#form_status').val(),
                            d.app_status = $('#app_status').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'application_id', name: 'application_id'},
                    {data: 'full_name', name: 'full_name',searchable: false},
                    {data: 'email', name: 'email'},
                    {data: 'application', name: 'application',searchable: false},
                    {data: 'admit', name: 'admit',searchable: false},
                    /* {data: 'payment', name: 'payment',searchable: false},*/
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            $('#pay_status').change(function(){
                table.draw();
            });
            $('#form_status').change(function(){
                table.draw();
            });
            $('#app_status').change(function(){
                table.draw();
            });
            $('#approve_submit').submit(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = new FormData(this);
                var  my_url = window.location.origin + "/approve";
                $('#tt').text('Wait...')
                $.ajax({
                    type: 'post',
                    url: my_url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {

                        location.reload();

                    },
                    error: function (data) {

                    }
                });
            });

        });
    </script>
    @break
    @case('edit-profile')
    <script>
        $(function () {
            $('#first_choice').on('change',function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#second_choice option").prop("selected", false).trigger( "change" );
                var my_url = window.location.origin +"/get-sub/"+$(this).val();
                $.ajax({
                    type: 'get',
                    url: my_url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#second_choice").empty();
                        $("#second_choice").append('<option >Select Subject</option>');
                        let isSelect  = $('#second_choice').val() ==
                        $.each(data.subject_list, function(index, item) {
                            $("#second_choice").append('<option value='+item.id+'>'+item.sub_name+'</option>');
                        });
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            })

            if($('#is_waiting').is(":checked")){
                $('#non_waiting').removeClass('d-block').addClass('d-none')
            }else{
                $('#non_waiting').removeClass('d-none').addClass('d-block')
            }
            $('#is_waiting').change(function(){
                console.log($(this).is(":checked"))
                if($(this).is(":checked")){
                    $('#non_waiting').removeClass('d-block').addClass('d-none')
                }else{
                    $('#non_waiting').removeClass('d-none').addClass('d-block')
                }
            });
            $('input[name="method_of_application"]').on('change', function() {
                const val = $(this).filter(":checked").val();
                console.log(val)
                if(val == 'Freshmen'){
                    $('#is_fresh').removeClass('d-none').addClass('d-block')
                    $('#is_not_fresh').removeClass('d-block').addClass('d-none')
                }else if(val == 'Transfer'){
                    $('#is_fresh').removeClass('d-block').addClass('d-none')
                    $('#is_not_fresh').removeClass('d-none').addClass('d-block')
                }else{
                    $('#is_fresh').removeClass('d-block').addClass('d-none')
                    $('#is_not_fresh').removeClass('d-block').addClass('d-none')
                }
            })
        });
    </script>
    <script src="{{asset('custom/js/user-info-update.js')}}"></script>
    @break
    @case('jamb-list')
    <script>
        $(function () {
            var table =  $("#jamb_list").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('jamb-list') }}",
                    data: function (d) {
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    {data: 'j_no', name: 'j_no'},
                    {data: 'subject1', name: 'subject1'},
                    {data: 'subject2', name: 'subject2'},
                    {data: 'subject3', name: 'subject3'},
                    {data: 'subject4', name: 'subject4'},
                    {data: 'total', name: 'total'},
                ]
            });
        });
    </script>
    @break
    @case('job-list')
    <script>
        $(function () {
            var table =  $("#job_list").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('job-list.list') }}",
                    data: function (d) {
                        d.type = $('#job_type').val(),
                            d.faculty = $('#faculty').val(),
                            d.department = $('#department').val(),
                            d.course = $('#course').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [

                    {data: 'f_name', name: 'f_name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'position', name: 'position',orderable: false,searchable: false},
                    {data: 'cv', name: 'cv',orderable: false,searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            $('#job_type').change(function(){

                if ($(this).val() == 1){
                    $( "#faculty").val($("#faculty option:first").val());
                    $( "#department" ).val($("#department option:first").val());
                    $( "#course" ).val($("#course option:first").val());

                    $( "#faculty").prop( "disabled", false );
                    $( "#department" ).prop( "disabled", false );
                    $( "#course" ).prop( "disabled", false );
                }else{
                    if ($(this).val() == 2){
                        $( "#faculty").val($("#faculty option:first").val());
                        $( "#department" ).val($("#department option:first").val());
                        $( "#course" ).val($("#course option:first").val());

                        $( "#faculty").prop( "disabled", true );
                        $( "#department" ).prop( "disabled", true );
                        $( "#course" ).prop( "disabled", true );
                    }else{
                        $( "#faculty").val($("#faculty option:first").val());
                        $( "#department" ).val($("#department option:first").val());
                        $( "#course" ).val($("#course option:first").val());

                        $( "#faculty").prop( "disabled", false );
                        $( "#department" ).prop( "disabled", false );
                        $( "#course" ).prop( "disabled", false );
                    }
                }
                console.log($(this).val())

                table.draw();
            });
            $('#course').change(function(){
                table.draw();
            });
            $('#department').change(function(){
                table.draw();
            });
            $('#faculty').change(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let id = 'all';
                if($(this).val() > 0){
                    id = $(this).val()
                }
                var my_url = window.location.origin +"/department/"+id;
                $.ajax({
                    type: 'get',
                    url: my_url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#department').empty();
                        // $('#course').empty();
                        $('#department').append('<option value="">All</option>')
                        data.department.forEach((element, index) => {
                            $('#department').append('<option value="'+element.id+'">'+element.job_title+'</option>')
                        } )

                        table.draw();
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            });
        });
        function  AplicationDelete(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var my_url = window.location.origin +"/application-delete/"+id;
                    $.ajax({
                        type: 'get',
                        url: my_url,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            toastr.success(data.message)
                            $('.table').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    });
                }
            })

        }
    </script>
    @break
    @case('student-report')
    <script>
    $(function () {
        var table = $("#report").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('student-report.index') }}",
                data: function (d) {
                    d.department = $('#department').val();
                    d.subject = $('#subject').val();
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.state = $('#state').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'application_id', name: 'application_id' },
                { data: 'full_name', name: 'full_name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'admitted_subject', name: 'admitted_subject' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print', 'colvis'
            ],
            select: true
        });

        function exportToPDF() {
            // Trigger the DataTable's PDF export button click
            $('#report').DataTable().button('pdf').trigger();
        }

        $('#department').change(function(){
            getSubject($('#department').val());
            table.draw();
        });

        $('#subject').change(function(){
            table.draw();
        });

        $('#start_date').change(function(){
            table.draw();
        });

        $('#end_date').change(function(){
            table.draw();
        });

        $('#state').change(function(){
            table.draw();
        });

        function getSubject(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var my_url = window.location.origin +"/get-subject/"+id;
            $.ajax({
                type: 'get',
                url: my_url,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#subject").empty();
                    $("#subject").append('<option value="0">Select Subject</option>');
                    $.each(data.subject, function(index, item) {
                        $("#subject").append('<option value='+item.id+'>'+item.sub_name+'</option>');
                    });

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });

    </script>
    @break
    @case('user-view')
    <script>
        $(function () {
            $('#approve_submit').submit(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = new FormData(this);
                var  my_url = window.location.origin + "/approve";
                $('#tt').text('Wait...')
                $.ajax({
                    type: 'post',
                    url: my_url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {

                        location.reload();

                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
    @break
@endswitch



