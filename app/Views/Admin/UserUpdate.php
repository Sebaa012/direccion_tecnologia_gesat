<?= $this->extend('Layout/layout') ?>

<?= $this->section('content') ?>

<?php if (session('rol') != 'ADMINISTRADOR') {
    redirect()->to(base_url('login'));
} ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="card-header bg-warning">
                        <h2 class="card-title text-center mb-4">Actualizar Usuario</h2>
                    </div>

                    <?= form_open('usuarios/updateUser/' . $usuario['id_usuario']) ?>
                    <div class="mb-3">
                        <?= form_label('Cédula', 'cedula', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'cedula', 'id' => 'cedula', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ej: 12345678', 'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "");', 'value' => $usuario['cedula']]) ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Nombre', 'nombre_u', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'nombre_u', 'id' => 'nombre_u', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese nombre', 'oninput' => 'this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, "");', 'value' => $usuario['nombre_u']]) ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Apellido', 'apellido_u', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'apellido_u', 'id' => 'apellido_u', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese apellido', 'oninput' => 'this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, "");', 'value' => $usuario['apellido_u']]) ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Correo electrónico', 'correo_electronico', ['class' => 'form-label']) ?>
                        <?= form_input(['name' => 'correo_electronico', 'id' => 'correo_electronico', 'type' => 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'correo@ejemplo.com', 'oninput' => 'this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, "");', 'value' => $usuario['correo_electronico']]) ?>
                    </div>


                    <div class="input-group mb-3">
                        <button class="btn btn-warning" id="update_password">Actualizar contraseña</button>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Contraseña', 'password', ['class' => 'form-label', 'id' => 'password-label']) ?>
                        <?= form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'oninput' => 'this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, "");']) ?>
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
                        <?= form_submit('submit', 'Actualizar Usuario', ['class' => 'btn btn-warning btn-lg']) ?>
                        <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('js/admin/user_update.js') ?>"></script>
<?= $this->endSection() ?>