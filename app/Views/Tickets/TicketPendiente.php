<?php echo $this->extend('Layout/layout'); ?>
<?php echo $this->section('content') ?>

<?php 
if (isset($_GET['asignado']) && $_GET['asignado'] == 1) { ?>
    <div class="alert alert-success" role="alert">Solicitud asignada correctamente</div>
<?php } ?>

<div class="mt-2">
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center fw-bold">Tickets Pendientes</h1>
            <p class="text-center text-secondary fw-bold border-bottom">Elija el requerimiento a atender</p>
        </div>

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="d-grid">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Solicitante</th>
                                <th>Departamento</th>
                                <th>Piso</th>
                                <th>Requerimiento</th>
                                <th>Detalle</th>
                                <th>Acción</th>
                                
                            </tr>
                        </thead>
                        <tbody id="ticket-list">
                            <?php foreach ($solicitudes as $solicitud) : ?>
                            <tr>
                                <td><?php echo $solicitud['nombre_solicitante'] ?></td>
                                <td><?php echo $solicitud['departamento'] ?></td>
                                <td><?php echo $solicitud['piso'] ?></td>
                                <td><?php echo $solicitud['tipo_solicitud'] ?></td>
                                <td><?php echo $solicitud['descripcion'] ?></td>
                            <th>
                                <button class="btn btn-primary"><i class="fas fa-user-check" onclick="alert('¿Desea marcar como resuelto?')"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-user-times" onclick="alert('¿Desea marcar como no resuelto? (Escalar Incidente)')"></i></button>
                            </th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



    <?php echo $this->endSection(); ?>
    <?= $this->section('scripts') ?>
    <?= $this->endSection() ?>