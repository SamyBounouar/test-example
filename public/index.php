<?php
require '../vendor/autoload.php';

$app = new \App\ListProducts;
$viewDatas = $app->run();

include 'views/product-list.php';