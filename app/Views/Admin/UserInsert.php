<?= $this->extend('Layout/layout') ?>

<?= $this->section('content') ?>

<?php if (session('rol') != 'ADMINISTRADOR') {
    redirect()->to(base_url('login'));
} ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4">Crear Usuario</h2>

                    <?= form_open('usuarios/saveUser', ['id' => 'form_newuser']) ?>
                    <div class="mb-3">
                        <?= form_label('Cédula', 'cedula', ['class' => 'form-label']) ?>
                        <?php echo form_input('cedula', '', ['class' => 'form-control', 'placeholder' => "Usuario", 'type' => 'number', 'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "");']); ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Nombre', 'nombre_u', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'nombre_u', 'id' => 'nombre_u', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese nombre', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, '');"]) ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Apellido', 'apellido_u', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'apellido_u', 'id' => 'apellido_u', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese apellido', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, '');"]) ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Correo electrónico', 'correo_electronico', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'correo_electronico', 'id' => 'correo_electronico', 'type' => 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'correo@ejemplo.com', 'oninput' => "this.value = this.value.replace(/[^a-zA-Z0-9@._+\-]/g, '');"])  ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Contraseña', 'password', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese contraseña', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, '');"]) ?>
                    </div>

                    <div class="mb-4">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-select" required>
                            <option value="">Seleccione un rol</option>
                            <option value="ADMINISTRADOR">Admin</option>
                            <option value="TECNICO">Técnico</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <?= form_submit('submit', 'Crear Usuario', ['class' => 'btn btn-primary btn-lg']) ?>
                        <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-secondary" onclick="validar()">Cancelar</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('js/admin/validate_user_insert.js') ?>"></script>
<?= $this->endSection() ?>