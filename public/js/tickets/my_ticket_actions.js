$(document).ready(function() {
    console.log('Módulo de acciones de tickets');
    $(document).on('click', '.btn-resolve', function(){

        $('#modal-descrip').modal('show');
    });


})