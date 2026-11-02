<?= $this->extend('Layout/layout') ?>

<?= $this->section('content') ?>

<?php if (session('rol') != 'ADMINISTRADOR') {
    redirect()->to(base_url('login'));
} ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-8 col-md-6 col-lg-5">
            <table class="table table-sm table-bordered table-striped table-hover border border-dark shadow-sm">
                <thead>
                    <tr>
                        <td class="bg-dark text-white py-2">
                            <h4 class="text-center mb-0">Administración de Usuarios</h4>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-dark">
                        <td class="d-flex justify-content-center py-2">
                            <a href="<?= base_url('/usuarios/insert') ?>" class="btn btn-success w-75">Crear Usuario <i class="fa-solid fa-user-plus"></i></a>
                        </td>
                    </tr>
                    <tr class="border border-dark">
                        <td class="d-flex justify-content-center py-2">
                            <a href="#" class="btn btn-warning w-75" id="btn-actualizar">Actualizar Usuario <i class="fa-solid fa-user-pen"></i></a>
                        </td>
                    </tr>
                    <tr class="border border-dark">
                        <td class="d-flex justify-content-center py-2">
                            <a href="#" class="btn btn-danger w-75" id="btn-eliminar">Eliminar Usuario <i class="fa-solid fa-user-xmark"></i></a>
                        </td>
                    </tr>
                    <tr class="border border-dark">
                        <td class="d-flex justify-content-center py-2">
                            <a href="<?= base_url('/usuarios') ?>" class="btn btn-primary w-75">Consultar Usuario <i class="fa-solid fa-user-check"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="modal-actualizar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-check">
                        <?php foreach ($usuarios as $usuario): ?>
                            <form action="" method="post"><input class="form-check-input" type="radio" name="id_tecnico" id="id_tecnico_<?= $usuario['cedula'] ?>" value="<?= $usuario['cedula'] ?>">
                                <label class="form-check-label" for="id_tecnico_<?= $usuario['cedula'] ?>">
                                    <?= $usuario['nombre'] ?>
                                </label>
                            </form>
                        <?php endforeach; ?>
                        <input type="hidden" name="id_ticket" value="">
                        <input type="submit" class="btn btn-warning w-25" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal justify-content-center" id="modal-eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Eliminar Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-check">
                        <?php foreach ($usuarios as $usuario): ?>
                            <form action="" method="post"><input class="form-check-input" type="radio" name="id_tecnico" id="id_tecnico_<?= $usuario['cedula'] ?>" value="<?= $usuario['cedula'] ?>">
                                <label class="form-check-label" for="id_tecnico_<?= $usuario['cedula'] ?>">
                                    <?= $usuario['nombre'] ?>
                                </label>
                            </form>
                        <?php endforeach; ?>
                        <input type="hidden" name="id_ticket" value="">
                        <input type="submit" class="btn btn-danger w-25" value="Eliminar" onclick="return confirm('¿Está seguro de eliminar el usuario? Esta acción no se puede deshacer')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('js/admin/modal_views.js') ?>"></script>
<?= $this->endSection() ?>