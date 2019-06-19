<?php

require_once "bootstrap.php";
require_once "src/Entity/Product.php";
require_once __DIR__ . "/vendor/autoload.php";


$productRepository = $entityManager->getRepository('Entity\Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo sprintf("-%s\n", $product->getName());
}

