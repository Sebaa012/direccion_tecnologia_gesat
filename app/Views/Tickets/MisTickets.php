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
            <h1 class="text-center fw-bold">Tickets Asignados</h1>
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
                                <th>ID</th>
                                <th>Solicitante</th>
                                <th>Departamento</th>
                                <th>Piso</th>
                                <th>Requerimiento</th>
                                <th>Detalle</th>
                                <th>Acción</th>
                                
                            </tr>
                        </thead>
                        <tbody id="ticket-list">
                        <?php if (empty($solicitudes)): ?>
                           <tr>
                                <td colspan="6" class="text-center">No hay tickets a resolver</td>
                           </tr>
                        <?php else: ?>
                        <?php foreach ($solicitudes as $solicitud) : ?>
                            <tr>
                                <td><?php echo $solicitud['id_solicitud'] ?></td>
                                <td><?php echo $solicitud['nombre_solicitante'] ?></td>
                                <td><?php echo $solicitud['departamento'] ?></td>
                                <td><?php echo $solicitud['piso'] ?></td>
                                <td><?php echo $solicitud['tipo_solicitud'] ?></td>
                                <td><?php echo $solicitud['descripcion'] ?></td>
                                <td>
                                <button type="" class="btn btn-success btn-resolve" id=""><i class="fas fa-user-check"></i></button>
                                <button type="" class="btn btn-danger btn-escalar"><i class="fas fa-user-times"></i></button>

                            </td>
                            </tr>

                     <div class="modal" id="modal-resolve">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="card-title">Añadir descripción
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                            <?= form_open('tickets/resolve/' . $solicitud['id_solicitud'], ['id' => 'form_escala']) ?>
                                                <?= form_label('Añada más detalles a su resolución: ', 'descripcion', ['class'=>'col-sm-4 col-form-label']);?>
                                                <?= form_textarea('descripcion', '', ['class' => 'form-control', 'id' => 'descripcion', 'rows'=> '4']);?>
                                                <?= form_submit('btn-confirm', 'Confirmar Resolución', ['class' => 'btn btn-success px-4 descripcion','id' => 'btn-confirm-resolve', 'required' => true]) ?>
                                            <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal" id="modal-escalate">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="card-title text-white">Añadir descripción
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                            <?= form_open('tickets/escalar/' . $solicitud['id_solicitud'], ['id' => 'form_resolve']) ?>
                                                <?= form_label('Añada más detalles a su resolución: ', 'descripcion', ['class'=>'col-sm-4 col-form-label']);?>
                                                <?= form_textarea('descripcion', '', ['class' => 'form-control', 'id' => 'descripcion', 'rows'=> '4']);?>
                                                <?= form_submit('btn-confirm', 'Escalar incidente', ['class' => 'text-white btn btn-danger px-4 descripcion','id' => 'btn-confirm-resolve', 'required' => true]) ?>
                                            <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                               
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                        
                        <?php endif;?>

                

            </div>
        </div>
    </div>







    <?php echo $this->endSection(); ?>
    <?= $this->section('scripts') ?>
    <script src="<?=base_url('js/tickets/my_ticket_actions.js') ?>"></script>
    <script src="<?=base_url('js/tickets/my_ticket_validate.js') ?>"></script>
    <?= $this->endSection() ?>