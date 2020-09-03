$(document).ready(() => {
    $('#cambioPassword').click((event) => {
        event.preventDefault();
        if ($('#password').attr('disabled')) {
            $('#password').attr('disabled', false);
            $('#password').val("");
        }
        else {
            $('#password').attr('disabled', true);
            $('#password').val("");
        }
    });

})