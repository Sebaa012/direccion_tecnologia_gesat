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

    function modalAsignar() {
        return bootstrap.Modal.getOrCreateInstance(document.getElementById('modal-asignar'));
    }

    function mostrarError(mensaje) {
        $('#asignar-error').removeClass('d-none').text(mensaje);
    }

    $(document).on('click', '#ticket-list .btn-asignar', function () {
        let idSolicitud = $(this).data('id-solicitud');

        $('#form-asignar')[0].reset();
        $('#asignar-error').addClass('d-none').text('');
        $('#id_solicitud_asignar').val(idSolicitud);

        modalAsignar().show();
    });

    // Enviar la asignación por AJAX (uno o varios técnicos)
    $('#form-asignar').on('submit', function (event) {
        event.preventDefault();

        let $form = $(this);
        let $boton = $form.find('.btn-confirmar-asignar');
        let idSolicitud = $('#id_solicitud_asignar').val();
        let idUsuarios = $form.find('input[name="id_usuario[]"]:checked').map(function () {
            return this.value;
        }).get();

        if (!idSolicitud) {
            mostrarError('No se identificó el ticket a asignar. Cierre el modal e intente de nuevo.');
            return;
        }

        if (idUsuarios.length === 0) {
            mostrarError('Seleccione al menos un técnico.');
            return;
        }

        $('#asignar-error').addClass('d-none').text('');
        $boton.prop('disabled', true);

        $.ajax({
            url: window.baseURL + 'tickets/asignar',
            method: 'POST',
            dataType: 'JSON',
            data: {
                id_solicitud: idSolicitud,
                id_usuario: idUsuarios
            },
            success: function (response) {
                if (response.status !== 'success') {
                    actualizarCsrf(response.csrf_hash);
                    mostrarError(response.message || 'No se pudo asignar el ticket.');
                    return;
                }

                modalAsignar().hide();
                $form[0].reset();

                actualizarCsrf(response.csrf_hash);

                obtenerTickets();
            },
            error: function (xhr) {
                if (xhr.status === 403) {
                    mostrarError('El token de seguridad expiró. Recargue la página e intente de nuevo.');
                    return;
                }

                mostrarError('Ocurrió un error al asignar el técnico. Intente de nuevo.');
                console.error('Error al asignar técnico:', xhr.responseText || xhr.statusText);
            },
            complete: function () {
                $boton.prop('disabled', false);
            }
        });
    });
});
