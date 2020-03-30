    <!-- script jquery / bootstrap -->
    <script src="<?= base_url("assets/download/jquery-3.4.1.min.js") ?>"></script>
    <script src="<?= base_url("assets/download/jquery-ui-1.12.1/jquery-ui.min.js") ?>"></script>
    <script src="<?= base_url("assets/download/bootstrap441/js/bootstrap.min.js") ?>"></script> 
    <!-- script Accueil -->
    <script src="<?= base_url("assets/JS/ctrl_inscription.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_connexion.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_resetPassword.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_newPassword.js") ?>"></script>
    
    <!-- modal loader -->
    <?= isset($reload) ? $reload : ""; ?>
        </div>
    </body>
</html>