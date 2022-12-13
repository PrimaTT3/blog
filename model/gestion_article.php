<?php
// Le model : les requetes SQL


// récupération des catégories
function get_categories() {
    global $pdo; // on récupère la variable $pdo depuis l'espace global
    $liste_categories = $pdo->query("SELECT * FROM categorie ORDER BY nom_categorie");
    return $liste_categories->fetchAll(PDO::FETCH_ASSOC);
}

// enregistrement de l'article et de la relation article <=> categorie
function create_post($titre, $img_principale, $id_categorie, $contenu) {
    global $pdo;
    $enregistrement = $pdo->prepare("INSERT INTO article (titre, img_principale, contenu, date_enregistrement, id_utilisateur) VALUES (:titre, :img_principale, :contenu, NOW(), :id_utilisateur)");
    $enregistrement->bindParam(':titre', $titre, PDO::PARAM_STR);
    $enregistrement->bindParam(':img_principale', $img_principale, PDO::PARAM_STR);
    $enregistrement->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $enregistrement->bindParam(':id_utilisateur', $_SESSION['utilisateur']['id_utilisateur'], PDO::PARAM_STR);
    $enregistrement->execute();

    // on récupère l'id_article qui vient d'être créé
    $id_article = $pdo->lastInsertId();

    $enregistrement_relation = $pdo->prepare("INSERT INTO relation_article_categorie (id_article, id_categorie) VALUES (:id_article, :id_categorie)");
    $enregistrement_relation->bindParam(':id_article', $id_article, PDO::PARAM_STR);
    $enregistrement_relation->bindParam(':id_categorie', $id_categorie, PDO::PARAM_STR);
    $enregistrement_relation->execute();
}

// Récupération des articles pour affichage dans un tableau html
function get_articles() {
    global $pdo;
    $liste_articles = $pdo->query("SELECT a.id_article, id_utilisateur, titre, nom_categorie, contenu, img_principale, date_enregistrement FROM article a, categorie c, relation_article_categorie r WHERE c.id_categorie = r.id_categorie AND a.id_article = r.id_article ORDER BY date_enregistrement DESC");

    return $liste_articles->fetchAll(PDO::FETCH_ASSOC);
}

// Suppression d'un article
function delete_post($id_article) {
    global $pdo;
    $suppression = $pdo->prepare("DELETE FROM article WHERE id_article = :id_article");
    $suppression->bindParam(':id_article', $id_article, PDO::PARAM_STR);
    $suppression->execute();
}