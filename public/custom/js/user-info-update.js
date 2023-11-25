$(function () {
    var base   = window.location.origin;
    function loading(is_start = true,text) {
        if (is_start){
            $('.load').prop("disabled",true).html('<span class="spinner-border spinner-border-sm mr-3" role="status" aria-hidden="true"></span>'+text);
        }else{
            $('.load').prop("disabled",false).text(text);
        }
    }
    $('#approve_submit').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        var  my_url = window.location.origin + "/approve-update";
        loading(true, 'Wait...')
        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {

                toastr.success(data.message)
                loading(false, 'Update')

            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#personal_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        loading(true, 'Wait...')
        var  my_url = base + "/user-info/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#kin_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         loading(true, 'Wait...')
        var formData = new FormData(this);
        var  my_url = base + "/kin-update/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#jamb_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         loading(true, 'Wait...')
        var formData = new FormData(this);
        var  my_url = base + "/jamb-update/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#waec_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         loading(true, 'Wait...')
        var formData = new FormData(this);
        var  my_url = base + "/waec-update/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#choice_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         loading(true, 'Wait...')
        var formData = new FormData(this);
        var  my_url = base + "/choice-update/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#edu_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         loading(true, 'Wait...')
        var formData = new FormData(this);
        var  my_url = base + "/edu-update/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
    $('#survey_update').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         loading(true, 'Wait...')
        var formData = new FormData(this);
        var  my_url = base + "/survey-update/"+$('#id').val();

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                 toastr.success(data.message)
                loading(false, 'Update')
            },
            error: function (data) {
                 toastr.error('Failed to update data')
                loading(false, 'Update')
            }
        });
    });
});
