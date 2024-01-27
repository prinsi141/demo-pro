$(document).ready(function() {
    // numeric value only
    $('.checkOnlyNumeric').on('input', function() {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });

    // numeric value alpha
    $('.checkOnlyAlpha').on('input', function() {
        $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
    });

    // select2
    $('#role_id').select2({
        placeholder: "Select roles"
    });

    // getState
    $.ajax({
        url: url + '/' + 'getState',
        type: 'GET',
        success: function(states) {
            var options = '<option value="">Select State</option>';
            $.each(states, function(key, value) {
                options += '<option value="' + key + '">' + value + '</option>';
            });
            $('#state').html(options);
        }
    });

    // getCity
    $('#state').change(function() {
        var state_id = $(this).val();
        $.ajax({
            url: url + '/' + 'getCity' + '/' + state_id,
            type: 'GET',
            success: function(cities) {
                var options = '<option value="">Select City</option>';
                $.each(cities, function(key, value) {
                    options += '<option value="' + key + '">' + value + '</option>';
                });
                $('#city').html(options);
            }
        });
        if (state_id) {
            $('.select-city').show();
        } else {
            $('.select-city').hide();
        }
    });
    $('.select-city').hide();

    // user form validation 
    $(document).on('click', '.save-user', function() {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var postcode = $('#postcode').val();
        var password = $('#password').val();

        var i = 0;

        $('#fname_err').text('');
        $('#lname_err').text('');
        $('#email_err').text('');
        $('#mobile_number_err').text('');
        $('#postcode_err').text('');
        $('#password_err').text('');

        if (first_name == '') {
            $('#fname_err').text('Please enter first name');
            i = 1;
        }
        if (last_name == '') {
            $('#lname_err').text('Please enter last name');
            i = 1;
        }
        if (email == '') {
            $('#email_err').text('Please enter email address');
            i = 1;
        }
        if (password == '') {
            $('#password_err').text('Please enter password');
            i = 1;
        }
        if (mobile == '') {
            $('#mobile_number_err').text('Mobile number is required');
            i = 1;
        }
        if (postcode == '') {
            $('#postcode_err').text('Please enter postcode');
            i = 1;
        }
        if (i == 1) {
            return false;
        }
    });

    // submit comman function users & role
    $('.form').submit(function(e) {
        var module = $(this).parents('.module').data('name');

        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: 'POST',
            url: url + '/' + module,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                window.location.href = url + '/' + module;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // delete record comman function users & role
    $('.delete-btn').click(function() {
        var deleteUrl = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'The item has been deleted.',
                            'success'
                        ).then((result) => {

                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the item.',
                            'error'
                        );
                    }
                });
            }
        });
    });

});