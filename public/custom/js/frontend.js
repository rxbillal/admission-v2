$(document).ready(function() {
    var base   = window.location.origin;
    function formReset(){
        $(".select2bs4").val(null).trigger('change');
        $(".select2").val(null).trigger('change');
        $('.modal').modal('hide');
        $('form').trigger("reset");
        $("input[type=text],input[type=file],input[type=email],input[type=password], textarea").val("");
        $('#summernote').summernote('code', '');
    }
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
                $.each(data.subject_list, function(index, item) {
                    $("#second_choice").append('<option value='+item.id+'>'+item.sub_name+'</option>');
                });
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('#reg_form').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        var  my_url = base + "/user-store";

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data)
                $('#alertS').removeClass('d-none').addClass('d-block');

                 formReset();

            },
            error: function (data) {

                if (data.type === 0) {
                    toastr.error(data.msg)
                }else{
                    toastr.error('Alreday have an account')
                }
            }
        });
    });
    $('#application_form').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $('#sbtn').attr("disabled",true).text('Submitting...');
        var formData = new FormData(this);
        var  my_url = base + "/application-store";

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data)
              location.reload();
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
});
