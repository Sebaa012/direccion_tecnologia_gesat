<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GESAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/dashboard') ?>">Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mis Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/tickets/pendientes') ?>">Pendientes</a>
                </li>
                <?php if (session()->get('rol') == 'ADMINISTRADOR') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/administration') ?>">Administrar Usuarios</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mt-3 py-2 my-sm-0">
                    <span class="navbar-text text-white mt-3 py-2 my-sm-0">
                        <?= session()->get('nombre_u') . ' ' . session()->get('apellido_u') ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger" href="<?= base_url('/logout') ?>"><i><i class="fa-solid fa-right-from-bracket my-2 my-sm-0"></i></i>Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>