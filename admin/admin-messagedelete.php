<?php
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';
    require_once '../includes/admincontrol.php';
    
    $user = new Admin();
    $user->setMessageid($_SESSION['admin-messageid']);
    $messageDelete = $user->deleteMessage();

    header('location:admin-message.php')

?>