    <!-- script jquery / bootstrap -->
    <script src="<?= base_url("assets/download/jquery-3.4.1.min.js") ?>"></script>
    <script src="<?= base_url("assets/download/jquery-ui-1.12.1/jquery-ui.min.js") ?>"></script>
    <script src="<?= base_url("assets/download/bootstrap441/js/bootstrap.min.js") ?>"></script> 
    <!-- script administrateur -->
    <script src="<?= base_url("assets/JS/ctrl_adherent.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_carte.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_metier.js") ?>"></script>
    <!-- modal loader -->
    <?= isset($reload) ? $reload : ""; ?>
    </body>
</html>