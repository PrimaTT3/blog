<?php
// La vue 
include 'inc/init.inc.php'; // initialisation du site
include 'inc/fonctions.inc.php'; // des fonctions utiles
include 'controller/gestion_article.php';

    


// début des affichages
include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>


        <div class="bg-light p-5 rounded">
            <h1 class="text-center border-bottom pb-3">Blog | Gestion article</h1>
            <p class="lead text-center">Bienvenue sur notre blog</p>
            <?php echo $msg; ?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <form method="post" class="border mt-5 p-3" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id="titre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="img_principale">Image principale</label>
                            <input type="text" name="img_principale" id="img_principale" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="id_categorie">Catégorie</label>
                            <select name="id_categorie" id="id_categorie" class="form-select">
                                <?php echo $options; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contenu">Contenu</label>
                            <textarea name="contenu" id="contenu" class="form-control" rows="14"></textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-outline-dark w-100">Enregistrement</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered mt-5">
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Contenu</th>
                            <th>Image principale</th>
                            <th>Date enregistrement</th>
                            <th>Supprimer</th>
                            <th>Modifier</th>
                        </tr>
                        <?php echo $tableau; ?>
                    </table>
                </div>
            </div>
        </div><!-- fermeture class="container" -->

<?php
include 'inc/footer.inc.php';
