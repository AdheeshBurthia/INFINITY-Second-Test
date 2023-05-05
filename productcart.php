<?php 
    session_start();
    require_once 'includes/conn.php';
    require_once 'includes/productdatabase.php';
    require_once 'includes/productcontrol.php';

    if(!isset($cartProduct)){
        header('location: products.php');
    }
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
    
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/productcart.css">

    <title>HOME | Rolex Watch</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="home.php" class="nav__logo">
                <i class='bx bxs-watch nav__logo-icon'></i> Rolex
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="home.php" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="aboutus.php" class="nav__link">About us</a>
                    </li>
                    <li class="nav__item">
                        <a href="products.php" class="nav__link active-link">Products</a>
                    </li>
                    <li class="nav__item">
                        <a href="contactus.php" class="nav__link">Contact us</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__shop" id="cart-shop">
                    <i class='bx bx-shopping-bag cartBtn' id=""></i>
                </div>

                <div id="count"></div>

                <?php 
                if(isset($_SESSION["authentication"])){
                    if($_SESSION["authentication"] == true){ 
                        $path = 'assets/userimage/' . $_SESSION['userimage'];
                ?>
                        <a href='profile.php' class='nav__login' id='nav-login' data-toggle='tooltip' data-placement='bottom' data-html='true' title='<u><?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?></u>'>
                            <img src="<?php echo $path ?>" alt="">
                        </a>
                <?php }elseif($_SESSION["authentication"] == false){ ?>
                        <a href='login.php' class='nav__login' id='nav-login' data-toggle='tooltip' data-placement='bottom' data-html='true' title='<u>Login</u>'>
                            <i class='bx bx-log-in-circle'></i>
                        </a>
                <?php } }else{ ?>
                        <a href='login.php' class='nav__login' id='nav-login' data-toggle='tooltip' data-placement='bottom' data-html='true' title='<u>Login</u>'>
                            <i class='bx bx-log-in-circle'></i>
                        </a> 
                <?php
                }?>
                

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt' ></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        
        <i class='bx bx-x cart__close' id="cart-close"  onclick='window.location.reload(true);'></i>

        <h2 class="cart__title-center">My Cart</h2>

        <div class="cart__container" id="table">

        <?php if(isset($_SESSION["authentication"])){
                if($_SESSION["authentication"] == true){ ?>

                <div id="retrieveCart"></div>
                
        <?php }elseif($_SESSION["authentication"] == false){ ?>
            
                <p>Please login to access cart!</p>

        <?php } }else{ 
                header('location:logout.php')
        ?>    

        <?php
        }?>       
        
        </div>

        <div class="cart__prices">
            
            <span class="cart__prices-item">Total price: </span>
            
            <div id="retrieveTotal"></div>
            
            </div>
            
        </div>
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">

    <div class="shape1"></div>
    <div class="shape2"></div>

    <?php foreach($cartProduct as $row) { ?>             

       <!-- ===== HOME ===== -->
       <main class="main grid">
            <div class="home product_data">
                <!-- ===== SNEAKER ===== -->
                <div class="sneaker">
                    <div class="sneaker__figure">
                    </div>

                    <div>
                        <img src="assets/img/<?php echo $row['photo']; ?>" alt="" class="sneaker__img shows">
                    </div>
                </div>

                <!-- ===== IFORMATION ===== -->
                <div class="info">
                    <!-- ===== DATA ===== -->
                    <div class="data">
                        <span class="data__subtitle">Rolex</span>
                        <h1 class="data__title"><?php echo $row['productname']; ?></h1>
                        <p class="data__description"><?php echo $row['description']; ?></p>
                    </div>

                    <!-- ===== PRICE ===== -->
                    <span class="price__title">Rs <?php echo $row['price']; ?></span>
                    <div class="price">
                        <div class="counter">
                            <div class="wrapper">
                                <button class="decrement-btn">-</button>
                                <input type="text" class='num input-qty' value="1" disabled>
                                <button class="increment-btn">+</button>
                            </div>
                        </div>
                        <button class="price__button " id="addToCartBtn" value ="<?php echo $row['productid']; ?>">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </main>

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