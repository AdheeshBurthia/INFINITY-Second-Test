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
            $cartRetrieve = $cart->retrieveCart();
            $total = 0;

            foreach($cartRetrieve as $row) { 
                $total = $total + ($row['quantity'] * $row['price']);
            }
    ?>
        <span class="cart__prices-total">Rs <?php echo number_format($total, 2); ?></span>

    <?php 
        }else{
    ?>
        <span class="cart__prices-total">Rs 0.00</span>
    <?php 
    }
    ?>

</body>
</html>