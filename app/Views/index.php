<?php echo $this->extend('Layout/layout'); ?>

<?php echo $this->section('content') ?>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="text-success fw-bold">Bienvenido</h1>
        <p class="text-muted fs-5">Sistema de Gestión de Actividades de Soporte Técnico</p>
    </div>

    <!-- Fila con dos tarjetas centradas y separadas -->
    <div class="row justify-content-center g-4">
        <!-- Tarjeta Izquierda -->
        <div class="col-12 col-md-5 col-lg-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="card-title text-primary fw-semibold mb-3">Iniciar Sesión</h4>
                        <p class="card-text text-muted mb-4">
                            Accede al sistema con tus credenciales asignadas.
                        </p>
                    </div>
                    <form action="<?php echo base_url('/login'); ?>" method="get">
                        <button type="submit" class="btn btn-primary w-100 py-2">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tarjeta Derecha -->
        <div class="col-12 col-md-5 col-lg-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="card-title text-secondary fw-semibold mb-3">Reportar Incidencia</h4>
                        <p class="card-text text-muted mb-4">
                            Registra una nueva solicitud o problema técnico.
                        </p>
                    </div>
                    <form action="<?php echo base_url('/solicitudes'); ?>" method="get">
                        <button type="submit" class="btn btn-secondary w-100 py-2">Reportar Incidencia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>