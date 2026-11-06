    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/footer_settings.js') ?>"></script>
    <script>
        window.baseURL = "<?= base_url() ?>";
        window.CSRF_TOKEN_NAME = "<?= csrf_token() ?>";
        window.CSRF_HEADER_NAME = "<?= csrf_header() ?>";

        // El token CSRF se regenera después de cada POST exitoso. Las páginas
        // que hacen peticiones AJAX actualizan el <meta>, pero los formularios
        // ya renderizados (como el de cerrar sesión) conservan el token viejo.
        // Esta función mantiene el meta y todos los campos ocultos sincronizados.
        window.refreshCsrfToken = function (token) {
            if (!token) {
                return;
            }

            var meta = document.querySelector('meta[name="' + window.CSRF_HEADER_NAME + '"]');
            if (meta) {
                meta.setAttribute('content', token);
            }

            document.querySelectorAll('form input[name="' + window.CSRF_TOKEN_NAME + '"]').forEach(function (input) {
                input.value = token;
            });
        };

        // Refuerzo: antes de enviar cualquier formulario POST, toma el token
        // más reciente que tenga la página.
        document.addEventListener('submit', function (event) {
            var form = event.target;
            if (!(form instanceof HTMLFormElement) || form.method.toLowerCase() !== 'post') {
                return;
            }

            var meta = document.querySelector('meta[name="' + window.CSRF_HEADER_NAME + '"]');
            var input = form.querySelector('input[name="' + window.CSRF_TOKEN_NAME + '"]');
            if (meta && input) {
                input.value = meta.getAttribute('content');
            }
        });
    </script>

    <footer class="footer bg-primary">
        <div class="container text-center mt-3 text-white">
            <p>&copy; 2026-2027 | DTIC | <span class="fw-bold" id="derechos" onmouseover="msOwner()">Todos los derechos reservados</span> | <a class="text-white text-decoration-none" href="https://github.com/Sebaa012/direccion_tecnologia_gesat" target="_blank"><i class="fab fa-github text-white"></i> Ver Código Fuente</a></p>
        </div>
    </footer>

    <?= $this->renderSection('scripts') ?>
</body>

</html>