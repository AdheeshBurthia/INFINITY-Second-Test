<?php
    session_start();
    require_once 'conn.php';
    require_once 'productdatabase.php';

    $cart = new Product();
    $cart->setUserid($_SESSION['userid']);
    $cartRetrieve = $cart->retrieveCart();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<!--=============== BOXICONS ===============-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!--=============== SWIPER CSS ===============--> 
<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--=============== CSS ===============-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<link rel="stylesheet" href="assets/css/cart.css">

    <title>HOME | Rolex Watch</title>
</head>
<body>
    <?php foreach($cartRetrieve as $row) { ?>
    
        <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/<?php echo $row['photo']; ?>" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title"><?php echo $row['productname']; ?></h3>
                    <span class="cart__price">Rs <?php echo $row['price']; ?></span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-number">Qty: <?php echo $row['quantity']; ?></span>
                        </div>
                        <button class="deleteItem" value="<?= $row['cartid']; ?>" onclick='window.location.reload(true);'>
                            <i class='bx bx-trash-alt cart__amount-trash'></i>
                        </button>
                    </div>
                </div>
            </article>

    <?php } ?>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/productcart.js"></script>
    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</body>
</html>