<?php
    session_start();
    require_once 'conn.php';
    require_once 'productdatabase.php';
    
    $cart = new Product();
    $cart_id = $_POST['cart_id'];
    $cart->setCartid($cart_id);
    $cartCheck = $cart->deleteProduct();

?>