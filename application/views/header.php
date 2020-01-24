<body>
    <header id="">
        <div class="">
            <a href="http://www.corif.fr/">
                <img src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="CORIF" class="img-responsive" height=auto max-width="100%"></a>
        </div> 
        <div class="container-fluid" id="menu">
            <nav class="navbar navbar-expand-lg " style="padding-left:25%">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <!-- Accueil -->
                        <a class="nav-link" id="accueil" href="<?= site_url("accueil") ?>">ACCUEIL</a>

                    </li>                   
                    <?php  isset ($_SESSION['role']) ? $role = $_SSION['role'] : $role = "accueil"; ?>

                    <?php if ($role == "accueil") { ?>
                                               
                        <li class="nav-item">
                            <a class="nav-link" href= "<?= site_url("modal/connexionModal") ?>" data-toggle="modal" data-target="#connexionModal">CONNEXION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url("modal/jeuModal") ?>" data-toggle="modal" data-target="#jeuModal">ESPACE JEU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url("accueil/animation") ?>">REGLES</a>
                        </li>
                        <li class="nav-item dropdown">
                           
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="true">INFORMATIONS</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url("accueil/avantpropos") ?>">Avant propos</a>
                                <a class="dropdown-item" href="<?= site_url("accueil/remerciements") ?>">Remerciements</a>
                            </div>
                        </li>

                    <?php } else { ?>
                        <!-- administrteur -->
                        <?php if ($role == "administrateur") { ?>
                            
                            <li class="nav-item dropdown">
                               
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="true">ADMINISTRATION</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= site_url("administration/adherent") ?>">Adherents</a>
                                    <a class="dropdown-item" href="<?= site_url("administration/carte") ?>">Cartes</a>
                                    <a class="dropdown-item" href="<?= site_url("administration/dashboad") ?>">Tableau bord admin</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION</a>
                            </li>
                        <?php }  ?>
                        <!-- formateur -->
                        <?php if ($_SESSION["role"] == "formateur") { ?>
                           
                            <li>
                                <a class="nav-link" href="<?= site_url("jeu/dashboad") ?>">GESTION</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?= site_url("jeu/create_session") ?>">SESSION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION</a>
                            </li>
                        <?php } ?>
                       <!-- invite -->
                        <?php if ($role == "invite") { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION </a>
                            </li>
                            <li class="nav-item">
                                
                                <a class="nav-link" href="<?= site_url("accueil/animation") ?>">REGLES</a>
                            </li>
                        <?php }  ?>
                      
                    <?php }  ?>
                   
                </ul>
                
                <span id="afLogin"> <?= isset($_SESSION['role']) ? $_SESSION["role"] . " : " . $_SESSION['nom'] . " " . $_SESSION['prenom'] : "" ?></span>

            </nav>
        </div>
    </header>