<?php echo $this->extend('Layout/layout'); ?>

<?php echo $this->section('content') ?>

<div class="container">
    <h1 class="text-center mt-5 text-success">Bienvenido</h1>
    <p class="text-center fw-bold">Sistema de Gestión de Actividades de Soporte Técnico</p>
    <div class="row justify-content-center">
        <div class="col-4 text-center">
            <form action="<?php echo base_url('usuarios') ?>" method="get">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
        <div class="col-4 text-center">
            <form action="<?php echo base_url('reportar') ?>" method="post">
                <buttosn type="submit" class="btn btn-secondary">Reportar
                    Incidencia</button>
            </form>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>