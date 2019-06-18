<?php

namespace poo;
require_once 'ArticleManager.php';
require_once 'Article.php';

$am = new ArticleManager();

if (isset($_POST['verb']) && $_POST['verb'] === 'add') {
    $data = [];
    $data['titre'] = $_POST['title'];
    $data['auteur'] = $_POST['author'];
    $data['message'] = $_POST['message'];

    $article = new Article($data);
    $am->addArticle($article);
    header('Location: index.php');

}

if (isset($_POST['verb']) && $_POST['verb'] === 'put') {
    $data = [];
    $data['titre'] = $_POST['title'];
    $data['auteur'] = $_POST['author'];
    $data['message'] = $_POST['message'];
    $data['id'] = $_POST['id'];

    $article = new Article($data);

    $am->updateArticle($article);
    header('Location: index.php');
}

if (isset($_GET['verb']) && $_GET['verb'] === 'delete') {

    $id = $_GET['id'];

    $am->deleteArticle($id);
    header('Location: index.php');

}