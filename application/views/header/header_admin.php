
    <div>
    <nav class="navbar navbar-dark bg-custom navbar-expand-lg" > 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- appeler le logo apres le bouton -->
        <a class="navbar-brand" href="#"></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("Accueil") ?>">ACCUEIL</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("Administration/invite") ?>">INVITE-E(S)</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADHERENTS</a>
                    <!-- bloc menu déroulant -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="<?= site_url("Administration/adherent") ?>">Modification/Liste</a>
                        <a class="dropdown-item" href="#"></a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CARTES</a>
                    <!-- bloc menu déroulant -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= site_url("Administration/ajout_carte") ?>">Ajout</a>
                        <a class="dropdown-item" href="<?= site_url("Administration/carte") ?>">Modification/Liste</a>
                        <a class="dropdown-item" href="#"></a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">METIERS</a>
                    <!-- bloc menu déroulant -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= site_url("Administration/ajout_metier") ?>">Ajout</a>
                        <a class="dropdown-item" href="<?= site_url("Administration/metier") ?>">Modification/Liste</a>                   
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url("Connexion/deconnexion") ?>">DECONNEXION</a>
                </li>

            </ul>
        </div>      
    </nav>
</div>
</header>

