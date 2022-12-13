<?php
// le controller
include 'model/index.php';

$liste_articles = get_articles();
$affichage = '';
foreach($liste_articles AS $sous_tableau) {
    $affichage .= '<div class="article">';

    $affichage .= '<h2>' . $sous_tableau['titre'] . '</h2>';
    $affichage .= '<img src="' . $sous_tableau['img_principale'] . '" alt="Image de l\'article : ' . $sous_tableau['titre'] . '" class="img-thumbnail">';
    $affichage .= '<p class="mt-3">Par : Admin, le : ' . $sous_tableau['date_enregistrement'] . '. Catégorie : ' . $sous_tableau['nom_categorie'] . '</p>';
    $affichage .= '<p>' . $sous_tableau['contenu'] . '</p>';

    $affichage .= '</div>';
}