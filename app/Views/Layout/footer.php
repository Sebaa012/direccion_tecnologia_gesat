    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/footer_settings.js') ?>"></script>
    <script>
        window.baseURL = "<?= base_url() ?>";
    </script>

    <footer class="footer bg-primary">
        <div class="container text-center mt-3 text-white">
            <p>&copy; 2026-2027 | DTIC | <span class="fw-bold" id="derechos" onmouseover="msOwner()">Todos los derechos reservados</span> | <a class="text-white text-decoration-none" href="https://github.com/Sebaa012/direccion_tecnologia_gesat" target="_blank"><i class="fab fa-github text-white"></i> Ver Código Fuente</a></p>
        </div>
    </footer>

    <?= $this->renderSection('scripts') ?>
</body>

</html>