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
              if (data.responseJSON.type === 0) {
                    toastr.error(data.responseJSON.msg)
                }else{
                    toastr.error('Registration Failed')
                }
            }
        });
    });
});
