<?php echo $this->extend('Layout/layout'); ?>
<?php echo $this->section('content') ?>

<?php 
if (isset($_GET['asignado']) && $_GET['asignado'] == 1) { ?>
    <div class="alert alert-success" role="alert">Solicitud asignada correctamente</div>
<?php } ?>

<div class="mt-2">
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center fw-bold">Tickets Disponibles</h1>
            <p class="text-center text-secondary fw-bold border-bottom">Elija el requerimiento a atender</p>
        </div>

    </div>

    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card shadow bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Prioridad Alta</h5>
                        <p class="card-text">10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Prioridad Media</h5>
                        <p class="card-text">10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Prioridad Baja</h5>
                        <p class="card-text">10</p>
                    </div>
                </div>
            </div>
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
                            <!-- Se carga dinámicamente -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

<div class="modal" id="modal-asignar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">Asignar Técnico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-check">
                    <?php foreach ($usuarios as $usuario): ?>
                        <form action="<?= base_url('tickets/asignar') ?>" method="post">
                            <label class="form-check-label d-flex justify-content-between align-items-center border p-2 rounded mb-2" for="id_usuario_<?= $usuario['id_usuario'] ?>">
                                <?= $usuario['nombre_u'] . " " . $usuario['apellido_u'] ?>
                                <a href="#" class="btn btn-success btn-confirmar-asignar" data-id-usuario="<?= $usuario['id_usuario'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                            </label>
                        </form>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php echo $this->endSection(); ?>
    <?= $this->section('scripts') ?>
    <script src="<?= base_url('js/tickets/main_view_tickets.js') ?>"></script>
    <?= $this->endSection() ?>