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
                            <tr class="table-warning">
                                <th>Encargado</th>
                                <th>Departamento</th>
                                <th>Requerimiento</th>
                                <th>Solicitante</th>
                                <th>Estado</th>
                                <th>Reasignar</th>
                                
                            </tr>
                        </thead>
                        <tbody id="ticket-list">
                            <?php foreach ($solicitudes as $solicitud) : ?>
                            <tr>
                                <td><?php echo $solicitud['nombre_tecnico'] ?></td>
                                <td><?php echo $solicitud['departamento'] ?></td>
                                <td><?php echo $solicitud['tipo_solicitud'] ?></td>
                                <td><?php echo $solicitud['solicitante'] ?></td>
                                <td><?php echo $solicitud['estado'] ?></td> 
                                <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <select>
                                        <?php foreach($usuarios as $usuario): ?>
                                            <option value="<?=$usuario['id_usuario']?>"><?=$usuario['nombre']?></option>
                                        <?php endforeach;?>
                                    </select>
                                    
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



    <?php echo $this->endSection(); ?>
    <?= $this->section('scripts') ?>
    <?= $this->endSection() ?>