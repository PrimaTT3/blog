<?php
// Le controller : les traitements PHP
// on récupère le model (le chemin part depuis le fichier d'où est appelé celui ci)
include 'model/gestion_article.php';

if(!empty($_SESSION['message'])) {
    $msg .= $_SESSION['message'];
    unset($_SESSION['message']);
}

// Traitements PHP
// restriction d'accès : si l'utilisateur n'est pas admin, on redirige vers connexion.php
if( ! user_is_admin() ) {
    header('location: connexion.php');
    exit(); // on bloque l'exécution du code qui suit cette ligne.
}


// Récupération des catégorie et préparation des options du select
$categories = get_categories();
$options = '';
foreach($categories AS $sous_tableau) {
    $options .= '<option value="' . $sous_tableau['id_categorie'] . '">' . $sous_tableau['nom_categorie'] . '</option>';
}


// Enregistrement des articles
if( isset($_POST['titre']) && isset($_POST['img_principale']) && isset($_POST['id_categorie']) && isset($_POST['contenu']) ) {
    $titre = trim($_POST['titre']);
    $img_principale = trim($_POST['img_principale']);
    $id_categorie = trim($_POST['id_categorie']);
    $contenu = trim($_POST['contenu']);

    create_post($titre, $img_principale, $id_categorie, $contenu);
    header('location: gestion_article.php'); // on recharge la page afin de ne pas faire un double enregistrement en  rafraichissant la page
}

// Suppression d'un article
if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_article'])) {
    delete_post($_GET['id_article']);
    $_SESSION['message'] = '<div class="alert alert-success">L\'article n°' . $_GET['id_article'] . ' a bien été supprimé.</div>';
    header('location: gestion_article.php');
}



// Affichage du tableau html
$liste_articles = get_articles();
$tableau = '';
foreach($liste_articles AS $sous_tableau) {
    $tableau .= '<tr>';

    $tableau .= '<td>' . $sous_tableau['id_article'] . '</td>';
    $tableau .= '<td>' . $sous_tableau['id_utilisateur'] . '</td>';
    $tableau .= '<td>' . $sous_tableau['titre'] . '</td>';
    $tableau .= '<td>' . $sous_tableau['nom_categorie'] . '</td>';
    $tableau .= '<td>' . substr($sous_tableau['contenu'], 0, 11) . ' ...</td>';
    $tableau .= '<td><img src="' . $sous_tableau['img_principale'] . '" style="width: 100px;"></td>';
    $tableau .= '<td>' . $sous_tableau['date_enregistrement'] . '</td>';
    $tableau .= '<td><a href="?action=supprimer&id_article=' . $sous_tableau['id_article'] . '" class="btn btn-danger" onclick="return(confirm(\' êtes vous sûr ?\'))" ><i class="bi bi-trash"></i></a></td>';

    $tableau .= '</tr>';
}
