<?php

require_once "bootstrap.php";
require_once "src/Entity/Product.php";
require_once __DIR__ . "/vendor/autoload.php";

$id = $argv[1];
$newName = $argv[2];

$productRepository = $entityManager->getRepository('Entity\Product');
$product = $productRepository->find($id);
if ($product === NULL) {
    echo "Product $id n'existe pas";
}
$product->setName($newName);
$entityManager->flush();
