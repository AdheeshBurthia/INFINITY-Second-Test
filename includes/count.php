<?php
    session_start();
    require_once 'conn.php';
    require_once 'productdatabase.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | Rolex Watch</title>
</head>
<body>
<?php 
    if(isset($_SESSION['userid'])){
    $cart = new Product();
    $cart->setUserid($_SESSION['userid']);
    $cartCount = $cart->countCart();
?>
    <p class="totalItem"><?php  echo count($cartCount); ?></p>

<?php 
    }else{
?>
    <p class="totalItem">0</p>
<?php 
}
?>
        
   
    

</body>
</html>