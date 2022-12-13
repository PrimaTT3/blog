<?php
// le model

// Récupération des articles pour affichage dans un tableau html
function get_articles() {
    global $pdo;
    $liste_articles = $pdo->query("SELECT a.id_article, id_utilisateur, titre, nom_categorie, contenu, img_principale, date_enregistrement FROM article a, categorie c, relation_article_categorie r WHERE c.id_categorie = r.id_categorie AND a.id_article = r.id_article ORDER BY date_enregistrement DESC");

    return $liste_articles->fetchAll(PDO::FETCH_ASSOC);
}