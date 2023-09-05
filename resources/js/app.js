$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.delete-button').click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/delete/email/' + id,
            type: 'DELETE',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                $('#row-' + id).remove();
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2000
                })
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        });
    });
});