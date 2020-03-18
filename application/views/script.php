<div>
    <!-- script jquery / bootstrap -->
    <script src="<?= base_url("assets/download/jquery-3.4.1.min.js") ?>"></script>
    <script src="<?= base_url("assets/download/jquery-ui-1.12.1/jquery-ui.min.js") ?>"></script>
    <script src="<?= base_url("assets/download/bootstrap441/js/bootstrap.min.js") ?>"></script>   
    <!-- script accueil -->
    <script src="<?= base_url("assets/JS/ctrl_inscription.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_connexion.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_resetPassword.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_newPassword.js") ?>"></script>
    <!-- script administrateur -->
    <script src="<?= base_url("assets/JS/ctrl_adherent.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_carte.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_metier.js") ?>"></script>
    <!-- script adhérents-->
    <script src="<?= base_url("assets/JS/ctrl_metierSession.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_inviteSession.js") ?>"></script>
    <script src="<?= base_url("assets/JS/ctrl_sessionSession.js") ?>"></script>
    <!-- script invite -->
    <script src="<?= base_url("assets/JS/ctrl_connexionInvite.js") ?>"></script>
    <script src="<?= base_url("assets/JS/script_jeu.js") ?>"></script>

    
</div>

<?= isset($reload) ? $reload : ""; ?>

</body>

</html>