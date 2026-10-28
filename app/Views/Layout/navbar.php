
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GESAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mis Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pendientes</a>
                    </li>
                    <?php if (session()->get('rol') == 'ADMINISTRADOR') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Administrar Usuarios</a>
                    </li>
                    <?php } ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/logout') ?>">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
