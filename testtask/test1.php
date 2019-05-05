<?php
use andrew_marhai\product\Product;

$prod = new Product();
var_dump($prod->connect());
$res = $prod->loadFromDB();
foreach ($res as $item){
    var_dump($item);
}