<?php
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';
    
    if (isset($_GET['QStrUserID'])){
        $_SESSION['admin-userid'] = (int)($_GET['QStrUserID']);
        $user = new Admin();
        $user->setUserid($_SESSION['admin-userid']);
        $cartDelete = $user->deleteCart();
        $userDelete = $user->deleteUser();

        header('location:admin.php');
    }

?>