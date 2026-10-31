<?php echo $this->extend('Layout/layout'); ?>

<?= $this->section('content'); ?>

<?php if (session()->get('rol') != null) { ?>
    <script>
        window.location.href = "/dashboard";
    </script>
<?php } ?>


<div class="row text-center mt-4">
    <div class="col-md-12">
        <a href="<?php echo base_url('/') ?>" class="btn btn-primary mb-3 bg-white text-primary border border-primary shadow"><i class="fa-solid fa-arrow-left"></i>Volver a la página principal</a>
    </div>
</div>

<div class="row justify-content-center py-4">
    <?php if (isset($_GET['solicitud']) && $_GET['solicitud'] == 1) { ?>
        <div class="col-12 col-md-8 col-lg-7 alert alert-success" role="alert">Solicitud enviada correctamente</div>
    <?php } ?>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <div class="col-12 col-md-8 col-lg-7 alert alert-danger" role="alert">Error al enviar la solicitud</div>
    <?php } ?>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-7">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h1 class="card-title text-center h3 mb-1">Solicitud de Soporte</h1>
                <h2 class="text-center text-muted h6 mb-4">Reportar una falla</h2>

                <?= form_open('saveSolicitud', ['id' => 'form_solicitud']) ?>

                <div class="row mb-3 align-items-center">
                    <?= form_label('Tipo de solicitud', 'tipo_solicitud', ['class' => 'col-sm-4 col-form-label']); ?>
                    <div class="col-sm-8">
                        <?= form_dropdown('tipo_solicitud', [
                            '' => 'Seleccione el tipo de solicitud',
                            'Sin conexión a internet' => 'Sin conexión a internet',
                            'Equipo no enciende' => 'Equipo no enciende',
                            'Office no funciona' => 'Office no funciona',
                            'Problema de impresora' => 'Problema de impresora',
                            'Teléfono sin conexión' => 'Teléfono sin conexión'
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
                            '' => 'Seleccione el piso',
                            'Sótano' => 'Sótano',
                            'PB' => 'PB',
                            'Primer Piso' => 'Primer Piso',
                            'Segundo Piso' => 'Segundo Piso',
                            'Tercer Piso' => 'Tercer Piso',
                            'Cuarto Piso' => 'Cuarto Piso',
                            6 => 'Quinto Piso',

                        ], '', ['class' => 'form-select ', 'id' => 'piso', 'required' => true, 'placeholder' => 'Seleccione el piso']); ?>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <?= form_label('Nombre del solicitante', 'nombre_solicitante', ['class' => 'col-sm-4 col-form-label', 'required' => true]); ?>
                    <div class="col-sm-8">
                        <?= form_input('nombre_solicitante', '', ['class' => 'form-control', 'id' => 'nombre_solicitante', 'placeholder' => 'Nombre completo', 'oninput' => "this.value = this.value.replace(/[^a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑ.,¿?¡!-]/g, '')"]); ?>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <?= form_label('Teléfono', 'telefono', ['class' => 'col-sm-4 col-form-label', 'required' => true]); ?>
                    <div class="col-sm-8">
                        <?= form_input('telefono', '', ['class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Ej. 04121234567', 'inputmode' => 'numeric', 'input' => 'number', 'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"]); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <?= form_label('Descripción:', 'descripcion', ['class' => 'col-sm-4 col-form-label']); ?>
                    <div class="col-sm-8">
                        <?= form_textarea('descripcion', '', ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Escribe una descripción de la falla', 'rows' => '4', 'oninput' => "this.value = this.value.replace(/[^a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑ.,¿?¡!-]/g, '')"]); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 offset-sm-4">
                        <?= form_submit('submit', 'Enviar solicitud', ['class' => 'btn btn-primary px-4', 'id' => 'submit']); ?>
                    </div>
                </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php echo $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('js/solicitudes/validate_solicitudes_view.js') ?>"></script>
<?= $this->endSection(); ?>