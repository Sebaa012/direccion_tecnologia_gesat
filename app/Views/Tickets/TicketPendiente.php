<?php echo $this->extend('Layout/layout'); ?>
<?php echo $this->section('content') ?>


<?php if (session()->get('rol') == null ){ ?>
    <script>
        window.location.href = "/";
    </script>
<?php } ?>

<div class="mt-2">

    <?php 
    if (isset($_GET['reasign']) && $_GET['reasign'] == 1) { ?>
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-success w-50 text-center" role="alert">Solicitud reasignada correctamente.</div>
            </div>
        </div>
    <?php } elseif (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-danger w-50 text-center" role="alert">Debe seleccionar al menos un técnico para reasignar.</div>
            </div>
        </div>
    <?php } ?>
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center fw-bold text-warning">Tickets Pendientes</h1>
            <p class="text-center text-secondary fw-bold border-bottom">Requerimientos Escalados/Sin atender</p>
        </div>

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="d-grid">
                    <table class="table table-hover table-bordered">
                        <thead class="table-warning">
                            <tr class="table-warning text-white">
                                <th>Encargado</th>
                                <th>Detalle</th>
                                <th>Departamento</th>
                                <th>Requerimiento</th>
                                <th>Solicitante</th>
                                <th>Estado</th>
                                <th>Reasignar</th>
                                
                            </tr>
                        </thead>
                        <tbody id="ticket-list">
                            <?php if(!empty($solicitudes)): ?>
                            <?php foreach ($solicitudes as $solicitud) : ?>
                            <tr>
                                <td><?php echo $solicitud['nombre_tecnico'] ?></td>
                                <td><?php echo $solicitud['desc_resolucion']?></td>
                                <td><?php echo $solicitud['departamento'] ?></td>
                                <td><?php echo $solicitud['tipo_solicitud'] ?></td>
                                <td><?php echo $solicitud['solicitante'] ?></td>
                                <td><?php echo $solicitud['estado'] ?></td> 
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <button type="button" class="btn btn-warning btn-reasignar" data-id-solicitud="<?= $solicitud['id_solicitud'] ?>">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No hay tickets pendientes</td>
                                </tr>
                        </tbody>
                        <?php endif;?>
                    </table>
                    <?php if (!empty($solicitudes)): ?>
                        <div class="modal" id="modal-asignar">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="form-asignar" action="<?= base_url('tickets/reasignar') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id_solicitud" id="id_solicitud_asignar" value="">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title fw-bold">Reasignar Técnico</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-muted small mb-2">Puede seleccionar uno o varios técnicos.</p>
                                            <p class="text-danger small mb-2 d-none" id="asignar-error"></p>
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <label class="form-check-label d-flex justify-content-between align-items-center border p-2 rounded mb-2" for="id_usuario_<?= $usuario['id_usuario'] ?>">
                                                    <?= esc($usuario['nombre']) ?>
                                                    <input type="checkbox" class="form-check-input" name="id_usuario[]" id="id_usuario_<?= $usuario['id_usuario'] ?>" value="<?= $usuario['id_usuario'] ?>">
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-warning btn-confirmar-asignar">Reasignar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>



    <?php echo $this->endSection(); ?>
    <?= $this->section('scripts') ?>
    <script src="<?= base_url('js/tickets/pend_ticket.js') ?>"></script>
    <?= $this->endSection() ?>