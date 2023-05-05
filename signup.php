<?php
    session_start();
    require_once 'includes/validation.php';

    if(isset($_SESSION["authentication"])){
        if($_SESSION["authentication"] == true){
            if($_SESSION["usertype"] == 0){
                header('Location:profile.php');
            }else if($_SESSION["usertype"] == 1){
                header('Location:admin/index.php');
            }
        }
    }else{
        header('location:logout.php');
    }

    if(isset($_SESSION['captcha'])){
        $now = time();
        if($now >= $_SESSION['captcha']){
          unset($_SESSION['captcha']);
        }
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

    <!-- Google reCAPTCHA CDN -->
    <script src=
        "https://www.google.com/recaptcha/api.js" async defer>
    </script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>SIGNUP | Rolex Watch</title>
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
        <!--==================== Login ====================-->
        <div class="l-form">
            <div class="shape1"></div>
            <div class="shape2"></div>

            <div class="form">
                <img src="assets/img/authentication.png" alt="" class="form__img">

                <form method="POST" class="form__content">
                    <h1 class="form__title">Welcome</h1>

                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bx-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Username</label>
                            <input type="text" class="form__input" name="username" value="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; unset($_SESSION['username']) ?>">
                        </div>
                    </div>
                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bx-envelope'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Email</label>
                            <input type="text" class="form__input" name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?>">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-lock' ></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Password</label>
                            <input type="password" class="form__input" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>">
                        </div>
                    </div>

                    <div class="form__recaptcha">
                        <?php
                            if(!isset($_SESSION['captcha'])){
                            echo '
                                <div class="form-group" style="width:100%;">
                                <div class="g-recaptcha" data-sitekey="6Lfz1gEhAAAAAMB2VjCU4xwbI2XzYNzdwORN1UH7"></div>
                                </div>
                            ';
                            }
                        ?>
                    </div>

                    <input type="submit" class="form__button" value="Signup" name="btnSignup">
                    <?php 
                        if(isset($_SESSION['error'])){
                            echo "<div class='alertmsg'>".$_SESSION['error']."</div>";
        
                            unset($_SESSION['error']);
                        }
                    ?>

                    <a href="login.php" class="form__signup">Already have an account, Log in now!</a>
                    
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
    <script src="assets/js/productcart.js"></script>

    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>