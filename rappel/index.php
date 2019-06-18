<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table>
        <tr>
            <th>Id</th>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Message</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
            require 'connect.php';

            function getArticles($dbh) {
                $stm = $dbh->query('SELECT * FROM article');
                return $stm->fetchAll();
            }

            $articles = getArticles($dbh);


            foreach ($articles as $article) {
                $id = $article['id'];
                $titre = $article['titre'];
                $auteur = $article['auteur'];
                $message = $article['message'];
                echo "
                <tr>
                    <td><a href=\"article.php?id=$id&verb=get\"> article $id </a></td>
                    <td> $auteur </td>
                    <td> $titre </td>
                    <td> $message </td>
                    <td> <a href=\"article.php?id=$id&verb=put\"> Modifier article</a></td>
                    <td> <a href=\"server.php?id=$id&verb=delete\"> supprimer l'article</a></td>
                </tr>";

            }
        ?>
    </table>

</body>
</html>