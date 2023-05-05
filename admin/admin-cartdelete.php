<?php
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';

    if (isset($_GET['QStrCartID'])){
        $_SESSION['admin-cartid'] = (int)($_GET['QStrCartID']);
    
        $user = new Admin();
        $userid = $_SESSION['admin-userid'];
        $user->setCartid($_SESSION['admin-cartid']);
        $userCartDelete = $user->deleteUserCart();

        header('location:admin-users.php');

    }

?>