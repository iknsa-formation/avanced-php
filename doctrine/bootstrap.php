<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$lisDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    array(__DIR__."/src"),
    $lisDevMode
);

$conn = array(
    'driver' => 'pdo_mysql',
    'user' => 'formation',
    'password' => 'PassPhp',
    'host' => 'localhost',
    'dbname' => 'formation'
);

$entityManager = EntityManager::create($conn, $config);
