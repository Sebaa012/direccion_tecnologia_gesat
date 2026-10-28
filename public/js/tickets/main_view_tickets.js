$(function () {
    console.log('Módulo de Tickets - AJAX');

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
                                    <a href="${window.baseURL}tickets/ver/${solicitud.id_solicitud}" class="btn btn-success btn-sm"><i class="fa-solid fa-save"></i></a>
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
});