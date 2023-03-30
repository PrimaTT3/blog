<?php
include 'inc/init.inc.php'; // initialisation du site
include 'inc/fonctions.inc.php'; // des fonctions utiles

    // Restriction d'accès
    if( ! user_is_connected()) { // si l'utilisateur n'est pas connecté, on le redirige sur connexion.php
        header('location: connexion.php');
    } 

    // Traitements PHP


// début des affichages
include 'inc/header.inc.php';
include 'inc/nav.inc.php';
// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>


        <div class="bg-light p-5 rounded">
            <h1 class="text-center border-bottom pb-3">Blog | Profil</h1>
            <?php echo $msg; ?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-6 mt-3">
                    <ul class="list-group">
                        <li class="list-group-item">N° utilisateur : <?php echo $_SESSION['utilisateur']['id_utilisateur']; ?></li>
                        <li class="list-group-item">Pseudo : <?php echo $_SESSION['utilisateur']['pseudo']; ?></li>
                        <li class="list-group-item">Email : <?php echo $_SESSION['utilisateur']['email']; ?></li>
                        <li class="list-group-item">Date d'inscription : <?php echo $_SESSION['utilisateur']['date_inscription']; ?></li>
                        <li class="list-group-item">Statut : <?php echo $_SESSION['utilisateur']['statut']; ?></li>
                    </ul>
                </div>
                <div class="col-6 mt-3">
                    <img src="assets/img/profil.jpg" alt="image de profil" class="img-thumbnail">
                </div>
            </div>
        </div>

<?php
include 'inc/footer.inc.php';
