<?php


$user = `formation`;
$pass = `PassPhp`;

try {
    $dbh = new PDO('jdbc:mysql://localhost:3306/test_pdo', $user, $pass);

    var_dump($dbh);

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
