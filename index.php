<?php
// La vue
include 'inc/init.inc.php'; // initialisation du site
include 'inc/fonctions.inc.php'; // des fonctions utiles
include 'controller/index.php';




// Début des affichages
include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>


        <div class="bg-light p-5 rounded">
            <h1 class="text-center border-bottom pb-3">Blog</h1>
            <p class="lead text-center">Bienvenue sur notre blog</p>
            <?php echo $msg; ?>
        </div>

        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-3">
                    <h4>Catégories</h4>
                </div>
                <div class="col-sm-9">
                    <?php echo $affichage; ?>
                </div>
            </div>
        </div>

<?php
include 'inc/footer.inc.php';
