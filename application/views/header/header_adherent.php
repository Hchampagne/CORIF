<div>
    <nav class="navbar navbar-dark bg-custom navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- appeler le logo apres le bouton -->
        <a class="navbar-brand" href="#"></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("accueil") ?>">ACCUEIL</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("jeu/dashboad") ?>">GESTION</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("Espace_jeu/creation_session") ?>">SESSION</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SESSION</a>
                    <!-- bloc menu déroulant -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= site_url("sessionModal") ?>" data-toggle="modal" data-target="#sessionModal">Creation session</a>
                        <a class="dropdown-item" href="<?= site_url("participantModal") ?>" data-toggle="modal" data-target="#participantModal">Ajout participant</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION</a>
                </li>

            </ul>
        </div>
    </nav>
</div>
</header>