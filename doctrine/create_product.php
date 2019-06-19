<?php
// create_product.php

require_once __DIR__ . "/vendor/autoload.php";
require_once "src/Entity/Product.php";
require_once "bootstrap.php";

use Entity\Product;

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";