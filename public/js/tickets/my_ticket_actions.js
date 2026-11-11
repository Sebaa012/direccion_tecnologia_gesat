$(document).ready(function() {
    console.log('Módulo de acciones de tickets');
    $(document).on('click', '.btn-resolve', function(){

        $('#modal-resolve').modal('show');
    });

    $(document).on('click', '.btn-escalar', function(){
        $('#modal-escalate').modal('show');
    })

})