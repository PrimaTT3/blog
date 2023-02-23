    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Blog</a>
                    </li>

                    <?php if(! user_is_connected() ) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Inscription</a>
                        </li>    

                    <?php } else { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="profil.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php?action=deconnexion">Déconnexion</a>
                        </li> 

                    <?php } ?>

                    <?php if(user_is_admin()) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="gestion_article.php">Gestion article</a>
                        </li>

                    <?php } ?>
                    
                    
                    

                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="rechercher..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Rechercher</button>
                </form> -->
            </div>
        </div>
    </nav>

    <main class="container"><!-- fermeture dans footer.inc.php -->