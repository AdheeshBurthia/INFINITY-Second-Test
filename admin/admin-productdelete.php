<?php
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';

    if (isset($_GET['QStrProdID'])){
        $_SESSION['admin-productid'] = (int)($_GET['QStrProdID']);
    
        $user = new Admin();
        $user->setProductid($_SESSION['admin-productid']);
        $cartDelete = $user->deleteProductCart();
        $productDelete = $user->deleteProduct();

        header('location:admin-products.php');

    }

?>