<?php

if(isset($_GET['cart'])){
    $products = $_SESSION['user']->getOrder()->getOrderLines();
    require_once("views/cartView.phtml");
    die();
}
if(isset($_GET['addProduct'])){
    //añadir el producto al carrito
    OrderLineRepository::addOrderLine($_GET['addProduct']);
    $_SESSION['user']->setOpenOrder();
}
?>