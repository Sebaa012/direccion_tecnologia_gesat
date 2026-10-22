<?php echo $this->extend('Layout/layout'); ?>
<?php echo $this->section('content') ?>

<div class="mt-2">
    <h1 class="text-center fw-bold">Tickets Disponibles</h1>
    <h2 class="text-center text-secondary">Elija el requerimiento a atender</h2>
    <hr>
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
                            <th>Oficina</th>
                            <th>Piso</th>
                            <th>Requerimiento</th>
                            <th>Detalle</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Ver</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>