<?php echo $this->extend('Layout/layout'); ?>

<?= $this->section('content'); ?>


<div class="row text-center mt-4">
    <div class="col-md-12">
        <a href="<?php echo base_url('/') ?>" class="btn btn-primary mb-3 bg-white text-primary border border-primary shadow"><i class="fa-solid fa-arrow-left"></i>Volver a la página principal</a>
    </div>
</div>

<div class="row justify-content-center py-4">
<?php if(isset($_GET['solicitud']) && $_GET['solicitud'] == 1){ ?>
    <div class="col-12 col-md-8 col-lg-7 alert alert-success" role="alert">Solicitud enviada correctamente</div>
<?php } ?>    
<?php if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
    <div class="col-12 col-md-8 col-lg-7 alert alert-danger" role="alert">Error al enviar la solicitud</div>
<?php } ?>
</div>

<div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="card-title text-center h3 mb-1">Solicitud de Soporte</h1>
                    <h2 class="text-center text-muted h6 mb-4">Reportar una falla</h2>

                    <?= form_open('saveSolicitud') ?>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Tipo de solicitud', 'tipo_solicitud', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_dropdown('tipo_solicitud', [
                                1 => 'Sin conexión a internet',
                                2 => 'Equipo no enciende',
                                3 => 'Office no funciona',
                                4 => 'Problema de impresora',
                                5 => 'Teléfono sin conexión'
                            ], '', ['class' => 'form-select', 'id' => 'tipo_solicitud', 'required' => true, 'placeholder' => 'Seleccione el tipo de solicitud']); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Departamento', 'departamento', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <select name="departamento" id="departamento" class="form-select" required>
                                <option value="0">Seleccione el departamento</option>
                                <?php foreach ($departamentos as $departamento) : ?>
                                    <option placeholder="Seleccione el departamento" value="<?= $departamento['departamento'] ?>"><?= $departamento['departamento'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center" id="piso">
                        <?= form_label('Piso', 'piso', ['class' => 'col-sm-4 col-form-label', 'required' => true]); ?>
                        <div class="col-sm-8">
                            <?= form_dropdown('piso', [
                                0 => 'Sótano',
                                1 => 'PB', 
                                2 => 'Primer Piso', 
                                3 => 'Segundo Piso', 
                                4 => 'Tercer Piso', 
                                5 => 'Cuarto Piso',
                                6 => 'Quinto Piso',
                                
                            ], '', ['class' => 'form-select ', 'id' => 'piso', 'required' => true, 'placeholder' => 'Seleccione el piso']); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Nombre del solicitante', 'nombre_solicitante', ['class' => 'col-sm-4 col-form-label', 'required' => true]); ?>
                        <div class="col-sm-8">
                            <?= form_input('nombre_solicitante', '', ['class' => 'form-control', 'id' => 'nombre_solicitante', 'placeholder' => 'Nombre completo', 'required' => true]); ?>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <?= form_label('Teléfono', 'telefono', ['class' => 'col-sm-4 col-form-label', 'required' => true]); ?>
                        <div class="col-sm-8">
                            <?= form_input('telefono', '', ['class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Ej. 0412-1234567']); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <?= form_label('Descripción:', 'descripcion', ['class' => 'col-sm-4 col-form-label']); ?>
                        <div class="col-sm-8">
                            <?= form_textarea('descripcion', '', ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Escribe una descripción de la falla', 'rows' => '4', 'required' => true]); ?>
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
