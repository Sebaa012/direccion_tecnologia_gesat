<?= $this->extend('Layout/layout') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Gestión de Usuarios</h1>
        <a href="<?= base_url('usuarios/insert') ?>" class="btn btn-primary">
            + Nuevo Usuario
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= esc($usuario['id_usuario']) ?></td>
                                    <td><?= esc($usuario['cedula']) ?></td>
                                    <td><?= esc($usuario['nombre_u']) ?></td>
                                    <td><?= esc($usuario['apellido_u']) ?></td>
                                    <td><?= esc($usuario['correo_electronico']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= ($usuario['rol'] === 'ADMINISTRADOR') ? 'danger' : 'info text-dark' ?>">
                                            <?= esc($usuario['rol']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No hay usuarios registrados.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>