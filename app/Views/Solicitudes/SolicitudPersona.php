<?php echo $this->extend('Layout/layout'); ?>

<?= $this->section('content'); ?>


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="card-title text-center h3 mb-1">Solicitud de Soporte</h1>
                    <h2 class="text-center text-muted h6 mb-4">Reportar una falla</h2>

                    <?= form_open('Solicitudes/SolicitudController/setSolicitud') ?>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Tipo de solicitud', 'tipo_solicitud', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_dropdown('tipo_solicitud', [
                                0 => 'Seleccione el tipo de solicitud',
                                1 => 'Sin conexión a internet',
                                2 => 'Equipo no enciende',
                                3 => 'Office no funciona',
                                4 => 'Problema de impresora',
                                5 => 'Teléfono sin conexión',
                                6 => ''
                            ], '', ['class' => 'form-select', 'id' => 'tipo_solicitud']); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Departamento', 'departamento', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_dropdown('departamento', [
                                0 => 'Seleccione el departamento',
                                1 => 'Sin conexión a internet',
                                2 => 'Equipo no enciende',
                                3 => 'Office no funciona',
                                4 => 'Problema de impresora',
                                5 => 'Teléfono sin conexión',
                                6 => ''
                            ], '', ['class' => 'form-select', 'id' => 'departamento']); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Oficina', 'oficina', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_dropdown('oficina', [
                                0 => 'Seleccione la oficina',
                                1 => 'Sin conexión a internet',
                                2 => 'Equipo no enciende',
                                3 => 'Office no funciona',
                                4 => 'Problema de impresora',
                                5 => 'Teléfono sin conexión',
                                6 => ''
                            ], '', ['class' => 'form-select', 'id' => 'oficina']); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Nombre del solicitante', 'nombre_solicitante', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_input('nombre_solicitante', '', ['class' => 'form-control', 'id' => 'nombre_solicitante', 'placeholder' => 'Nombre completo']); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Teléfono', 'telefono', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_input('telefono', '', ['class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Ej. 0412-1234567']); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <?= form_label('Descripción:', 'descripcion', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_textarea('descripcion', '', ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Escribe una descripción de la falla', 'rows' => '4']); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <?= form_submit('submit', 'Enviar solicitud', ['class' => 'btn btn-primary px-4']); ?>
                        </div>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
