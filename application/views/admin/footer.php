            <footer class="footer text-center">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-12 text-center">
                        <div class="copyright text-center text-xl-left text-muted">
                        Copyright © <?= date('Y') ?> <strong>aksipangan.com</strong>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/js-cookie/js.cookie.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
        <!-- Optional JS -->
        <script src="<?= base_url('assets/vendor/chart.js/dist/Chart.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/chart.js/dist/Chart.extension.js') ?>"></script>
        <!-- Argon JS -->
        <script src="<?= base_url('assets/js/argon.js?v=1.2.0') ?>"></script>
        <script src="<?= base_url('assets/js/style.js') ?>"></script>

        <script>
            var baseUrl = '<?= site_url() ?>/'
        </script>
        <?php if(@$ajax){
            foreach($ajax as $a){ ?>
                <script src="<?= base_url('assets/js/custom/') . $a .'.js' ?>"></script>
        <?php }} ?>
    </body>

</html>