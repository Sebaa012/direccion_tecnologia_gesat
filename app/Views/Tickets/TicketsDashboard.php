<?php echo $this->extend('Layout/layout'); ?>
<?php echo $this->section('content') ?>

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

<?php echo $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('js/tickets/main_view_tickets.js') ?>"></script>
<?= $this->endSection() ?>