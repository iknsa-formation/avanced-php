<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form‐data" action="server.php" method="post">

        Envoyez ce fichier :
        <input name="userfile" type="file" />
        Nom : <input type="text" name="nom">
        Prenom : <input type="text" name="prenom">
        <input type="submit" value="Envoyer" />

    </form>
</body>
</html>