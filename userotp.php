<?php
    session_start();
    require_once 'includes/validation.php';


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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>LOGIN | Rolex Watch</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="home.html" class="nav__logo">
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
                        <a href="products.php" class="nav__link">Products</a>
                    </li>
                    <li class="nav__item">
                        <a href="contactus.php" class="nav__link">Contact us</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x' ></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__shop" id="cart-shop">
                    <i class='bx bx-shopping-bag' ></i>
                </div>

                <?php if($_SESSION["authentication"] == true){ ?>
                        <a href='logout.php' class='nav__login' id='nav-login' data-toggle='tooltip' data-placement='bottom' data-html='true' title='<u>Logout from <?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?></u>' onClick = "return confirm('Are you sure you want to logout <?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?>?')">
                            <i class='bx bx-user'></i>
                        </a>
                <?php }else{ ?>
                        <a href='login.php' class='nav__login' id='nav-login' data-toggle='tooltip' data-placement='bottom' data-html='true' title='<u>Login</u>'>
                            <i class='bx bx-log-in-circle'></i>
                        </a>
                <?php } ?>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt' ></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        <i class='bx bx-x cart__close' id="cart-close"></i>

        <h2 class="cart__title-center">My Cart</h2>

        <div class="cart__container">
            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/featured1.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Jazzmaster</h3>
                    <span class="cart__price">$1050</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus' ></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus' ></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash' ></i>
                    </div>
                </div>
            </article>
            
            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/featured3.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Rose Gold</h3>
                    <span class="cart__price">$850</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus' ></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus' ></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash' ></i>
                    </div>
                </div>
            </article>

            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/new1.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Longines Rose</h3>
                    <span class="cart__price">$980</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus' ></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus' ></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash' ></i>
                    </div>
                </div>
            </article>
        </div>

        <div class="cart__prices">
            <span class="cart__prices-item">3 items</span>
            <span class="cart__prices-total">$2880</span>
        </div>
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== Login ====================-->
        <div class="l-form">
            <div class="shape1"></div>
            <div class="shape2"></div>

            <div class="form">
                <img src="assets/img/authentication.png" alt="" class="form__img">

                <form method="POST" class="form__content">
                    <h1 class="form__title">Code Verification</h1>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-lock' ></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Enter verification code</label>
                            <input type="password" class="form__input" name="otp" value="<?php echo (isset($_SESSION['otp'])) ? $_SESSION['otp'] : ''; ?>">
                        </div>
                    </div>

                    <input type="submit" class="form__button" value="Submit" name="btnLogin">
                    <?php 
                        if(isset($_SESSION['error'])){
                            echo "<div class='alertmsg'>".$_SESSION['error']."</div>";
        
                            unset($_SESSION['error']);
                        }
                    ?>
                    
                </form>
            </div>

        </div>

    </main>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>


</body>
</html>