$(function () {
    console.log('Módulo de Tickets - AJAX');

    function csrfMeta() {
        return $('meta[name="X-CSRF-TOKEN"]');
    }

    function actualizarCsrf(hash) {
        if (!hash) {
            return;
        }

        if (typeof window.refreshCsrfToken === 'function') {
            window.refreshCsrfToken(hash);
        } else {
            csrfMeta().attr('content', hash);
        }
    }

    $.ajaxSetup({
        beforeSend: function (xhr, opciones) {
            if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(opciones.type)) {
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfMeta().attr('content') || '');
            }
        }
    });

    obtenerTickets();
    setInterval(function () {
        obtenerTickets();
    }, 30000);

    function obtenerTickets() {
        $.ajax({
            url: window.baseURL + "tickets/listar",
            method: "GET",
            dataType: "JSON",
            success: function (solicitudes) {
                let tableTickets = '';
                if (!solicitudes || solicitudes.length == 0) {
                    tableTickets = '<tr><td colspan="6" class="text-center">No hay tickets disponibles</td></tr>';
                } else {
                    solicitudes.forEach(function (solicitud) {
                        tableTickets += `
                            <tr>
                                <td>${solicitud.nombre_solicitante}</td>
                                <td>${solicitud.departamento}</td>
                                <td>${solicitud.piso}</td>
                                <td>${solicitud.tipo_solicitud}</td>
                                <td>${solicitud.descripcion}</td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-asignar" data-id-solicitud="${solicitud.id_solicitud}">
                                        <i class="fa-solid fa-save"></i> Asignar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                }
                $('#ticket-list').html(tableTickets);
            },
            error: function (xhr, status, error) {
                console.error("Error al obtener tickets: ", error);
                $('#ticket-list').html('<tr><td colspan="6" class="text-center">Error al cargar tickets</td></tr>');
            }
        });
    }

    $(document).on('click', '.btn-asignar', function () {
        let idSolicitud = $(this).data('id-solicitud');
        console.log(idSolicitud);
        $('#modal-asignar').modal('show');
        $('#modal-asignar').data('id-solicitud', idSolicitud);
    });

    $(document).on('click', '.btn-confirmar-asignar', function () {
    let idUsuario = $(this).data('id-usuario');

    let idSolicitud = $('#modal-asignar').data('id-solicitud');

    $.ajax({
        url: window.baseURL + 'tickets/asignar', 
        method: 'POST',
        dataType: 'JSON',
        data: {
            id_usuario: idUsuario,
            id_solicitud: idSolicitud
        },
        success: function (response) {
            actualizarCsrf(response.csrf_hash);
        
            if (response.status !== 'success') {
                console.error(response.message);
                return;
            }
        
            $('#modal-asignar').modal('hide');
            obtenerTickets();
        },
        error: function (xhr, status, error) {
            if (xhr.status === 403) {
                console.error('Token CSRF inválido o expirado. Recargue la página.');
                return;
            }
            console.error('Error al asignar técnico:', error);
        }
        
    });
});
});