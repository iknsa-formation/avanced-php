<?php

include 'connect.php';


function addArticle($dbh, $article) {
    $titre = isset($article['titre']) ? $article['titre'] : 'titre vide';
    $auteur = isset($article['auteur']) ? $article['auteur'] : 'auteur inconnu';
    $message = isset($article['message']) ? $article['message'] : 'message vide';

    $stm = $dbh->prepare('INSERT INTO article(titre, auteur, message) 
                    VALUES (?, ?, ?)');
    $stm->execute(array(
        $titre,
        $auteur,
        $message
    ));

}

function updateArticle($dbh, $article) {

    $titre = isset($article['titre']) ? $article['titre'] : 'titre vide';
    $auteur = isset($article['auteur']) ? $article['auteur'] : 'auteur inconnu';
    $message = isset($article['message']) ? $article['message'] : 'message vide';
    $id = isset($article['id']) ? $article['id'] : 0;

    $stm = $dbh->prepare('UPDATE article SET titre=?, auteur=?, message=? WHERE id=?');
    $stm->execute(array(
        $titre,
        $auteur,
        $message,
        $id
    ));

}

if (isset($_POST['verb']) && $_POST['verb'] === 'add') {
    $article = [];
    $article['titre'] = $_POST['title'];
    $article['auteur'] = $_POST['author'];
    $article['message'] = $_POST['message'];

    addArticle($dbh, $article);
}

if (isset($_POST['verb']) && $_POST['verb'] === 'put') {
    $article = [];
    $article['titre'] = $_POST['title'];
    $article['auteur'] = $_POST['author'];
    $article['message'] = $_POST['message'];
    $article['id'] = (int) $_POST['id'];

    updateArticle($dbh, $article);
}

