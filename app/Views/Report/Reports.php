<?php 
 echo $this->extend('Layout/layout');
?>

<?php echo $this->section('content') ?>

<?php if (session()->get('rol') == null ){ ?>
    <script>
        window.location.href = "/";
    </script>
<?php } ?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center fw-bold">Reportes</h1>
            <p class="text-center text-secondary fw-bold border-bottom">Seleccione el tipo de reporte que desea generar</p>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4">Reportes de Solicitudes</h2>
                    <div class="d-grid gap-3">
                        <a href="<?= base_url('reportes/solicitudes') ?>" class="btn btn-primary btn-lg">Reporte de Solicitudes</a>
                        <a href="<?= base_url('reportes/bitacora') ?>" class="btn btn-secondary btn-lg">Bitácora de Solicitudes</a>
                    </div>
                </div>
            </div>

</div>

<?php echo $this->endSection() ?>