<?php echo $this->extend('Layout/layout'); ?>
<?php echo $this->section('content') ?>


<?php if (session()->get('rol') == null ){ ?>
    <script>
        window.location.href = "/";
    </script>
<?php } ?>

<div class="mt-2">

    <?php 
    if (isset($_GET['resolved']) && $_GET['resolved'] == 1) { ?>
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-success w-50 text-center" role="alert">Solicitud resuelta correctamente</div>
            </div>

        </div>
    <?php } ?>
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
                                <td>
                                <button type="" class="btn btn-success btn-resolve" id=""><i class="fas fa-user-check"></i></button>
                                    <form action="<?= base_url('tickets/escalar/' . $solicitud['id_solicitud']) ?>" method="post" class="m-0">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id_solicitud" value="<?php echo $solicitud['id_solicitud'] ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea marcar como no resuelto? (Escalar Incidente)')"><i class="fas fa-user-times"></i></button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


<div class="modal" id="modal-descrip">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="card-title">Añadir descripción
                </h5>

            </div>
            <div class="modal-body">
                <?= form_open('ticket/resolve', ['id' => 'form_resolve']) ?>
                <?= form_label('Añada más detalles a su resolución: ', 'descripcion', ['class'=>'col-sm-4 col-form-label']);?>
                <?= form_textarea('descripcion', '', ['class' => 'form-control', 'id' => 'descripcion', 'rows'=> '4']);?>

            </div>
            
        </div>
    </div>
</div>


    <?php echo $this->endSection(); ?>
    <?= $this->section('scripts') ?>
    <script src="<?=base_url('js/tickets/my_ticket_actions.js') ?>"></script>
    <?= $this->endSection() ?>