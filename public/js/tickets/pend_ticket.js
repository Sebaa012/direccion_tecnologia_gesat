$(function(){

    function modalAsignar() {
        return bootstrap.Modal.getOrCreateInstance(document.getElementById('modal-asignar'));
    }
    
    function mostrarError(mensaje) {
        $('#asignar-error').removeClass('d-none').text(mensaje);
    }
    
    $(document).on('click', '#ticket-list .btn-reasignar', function () {
        let idSolicitud = $(this).data('id-solicitud');
    
        $('#form-asignar')[0].reset();
        $('#asignar-error').addClass('d-none').text('');
        $('#id_solicitud_asignar').val(idSolicitud);
    
        modalAsignar().show();
    });
    
    $('#form-asignar').on('submit', function (event) {
        let $form = $(this);
        let idSolicitud = $('#id_solicitud_asignar').val();
        let idUsuarios = $form.find('input[name="id_usuario[]"]:checked').map(function () {
            return this.value;
        }).get();

        if (!idSolicitud) {
            event.preventDefault();
            mostrarError('No se identificó el ticket a reasignar. Cierre el modal e intente de nuevo.');
            return;
        }

        if (idUsuarios.length === 0) {
            event.preventDefault();
            mostrarError('Seleccione al menos un técnico.');
            return;
        }

        $('#asignar-error').addClass('d-none').text('');
    });
});
