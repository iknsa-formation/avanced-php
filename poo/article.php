<?php
namespace poo;
require_once 'ArticleManager.php';
require_once 'Article.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>

    <?php

    $am = new ArticleManager();
    $article = new Article($am->getArticle($_GET['id']));

    $id = $article->getId();
    $titre = $article->getTitre();
    $auteur = $article->getAuteur();
    $message = $article->getMessage();

    if (isset($_GET['verb']) && $_GET['verb'] === 'get') {
        echo "
           article $id rédigé par $auteur pour titre $titre et pour message $message
        ";
    } elseif (isset($_GET['verb']) && $_GET['verb'] === 'put') {
        echo "
            <form action=\"server.php\" method=\"post\">

                Titre : <input type=\"text\" name=\"title\" value=\"$titre\"></br>
                Auteur : <input type=\"text\" name=\"author\" value=\"$auteur\"></br>
                Message : <input type=\"text\" name=\"message\" value=\"$message\"></br>
                <input type=\"hidden\" name=\"id\" value=\"$id\"></br>

                <input type=\"hidden\" name=\"verb\" value=\"put\">
                <input type=\"submit\" value=\"Envoyer\" />
            </form>
        ";
    }

    ?>

</body>
</html>