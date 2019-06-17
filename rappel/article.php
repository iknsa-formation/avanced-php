<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="server.php" method="post">

        Titre : <input type="text" name="title"></br>
        Auteur : <input type="text" name="author"></br>
        Message : <input type="text" name="message"></br>

        <input type="hidden" name="verb" value="add">
        <input type="submit" value="Envoyer" />
    </form>

</body>
</html>