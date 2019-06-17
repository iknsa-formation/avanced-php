<?php


$user = 'formation';
$pass = 'PassPhp';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=formation', $user, $pass);

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

