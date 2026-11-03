
$(document).ready(function () {
    $('#password').hide();
    $('#password-label').hide();

    $(document).on('click', '#update_password', function () {
        $('#password').show();
        $('#password-label').show();
    });

    $(document).on('dblclick', '#update_password', function () {
        $('#password').hide();
        $('#password-label').hide();
    });
});