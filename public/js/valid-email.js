$(document).ready(function () {
    $('#email').on('blur', function(e) {
        e.preventDefault();

        let email = $('#email').val();
 
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/validUniqueEmail',
            data: { email: email},
            success: function (data) {
                $.each(data.errors, function(key, value){
                    $('.invalid-feedback').show();
                    $('.invalid-feedback').append('<strong>' + value + '</strong>');
                });

                setTimeout( function () {
                    $('.invalid-feedback').text('');
                }, 5000);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    });
});