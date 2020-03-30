<header>
    <nav class="navbar navbar-dark bg-custom navbar-expand-lg" > 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("accueil") ?>">ACCUEIL</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("modal/connexionModal") ?>" data-toggle="modal" data-target="#connexionModal">CONNEXION</a>
                </li>            
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INFORMATIONS</a>
                    <!-- bloc menu déroulant -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= site_url("accueil/avantpropos") ?>">Avant propos</a>
                        <a class="dropdown-item" href="<?= site_url("accueil/remerciements") ?>" >Remerciements</a>
                    </div>
                </li>             
            </ul>
        </div>      
    </nav>
</header>

