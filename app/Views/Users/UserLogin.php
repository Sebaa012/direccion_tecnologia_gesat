<?php echo $this->extend('Layout/layout') ?>

<?php echo $this->section('content') ?>

<?php if(session()->get('rol') != null) { ?>
    <script>
        window.location.href = "/dashboard";
    </script>
<?php } ?>

<div class="row text-center mt-4">
    <div class="col-md-12">
        <a href="<?php echo base_url('/') ?>" class="btn btn-primary mb-3 bg-white text-primary border border-primary shadow"><i class="fa-solid fa-arrow-left"></i>Volver a la página principal</a>
    </div>
</div>

<div class="row justify-content-center">
    

    <div class="card col-md-4 mt-4 py-4 shadow-lg">
        <div class="card-body">
            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="alert alert-danger"><?php echo "Usuario o contraseña vacíos" ?></div>
            <?php elseif (isset($_GET['error']) && $_GET['error'] == 2): ?>
                <div class="alert alert-danger"><?php echo "Usuario o contraseña inválidos" ?></div>
            <?php endif ?>

            <h1 class=" card-title text-center"> Login </h1>
            <p class="card-text text-center">Inicie sesión</p>

            <?php echo form_open('Users/LoginController/login') ?>
            <div class="mb-3">
                <?php echo form_label('Usuario (Cédula de Identidad)', 'cedula') ?>
                <?php echo form_input('cedula', '', ['class' => 'form-control', 'placeholder' => "Usuario", 'type' => 'number']); ?>
            </div>
            <div class="mb-3">
                <?php echo form_label('Contraseña', 'password') ?>
                <?php echo form_password('password', '', ['class' => 'form-control', 'placeholder' => "password", 'type' => 'password']); ?>
            </div>
            <?php echo form_submit('submit', 'Iniciar sesión', ['class' => 'btn btn-primary']) ?>
            <?php echo form_close() ?>



        </div>

    </div>

</div>

<?php echo $this->endSection() ?>