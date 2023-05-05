<?php
    session_start();
    require_once 'includes/conn.php';
    require_once 'includes/customer.php';
    require_once 'includes/message.php';
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
    <link rel="stylesheet" href="assets/css/contactus.css">

    <title>CONTACT | Rolex Watch</title>
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
                        <a href="contactus.php" class="nav__link active-link">Contact us</a>
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

        <section>
            <img src="assets/img/contact-header.jpg" alt="" class="contact-img">
        </section>

        <!--==================== CONTACT ====================-->
        <section class="story section container">
            <div class="story__container grid">
                <div class="story__data">
                    <h2 class="section__title story__section-title">
                        EXPLORE ROLEX AT RAFFI JEWELLERS
                    </h2>

                    <h1 class="story__title">
                        CONTACT US
                    </h1>

                    <p class="story__description">
                        With the necessary skills, technical know-how and special equipment, we can 
                        guarantee the authenticity of each and every part of your Rolex. Let us help 
                        you make the choice that will last you a lifetime, or answer any enquiry you 
                        may have. Please send us your details and your preferred mode of contact and 
                        we will respond as quickly as possible.
                    </p>
                    <div class="story-button">
                        <a href="#contact" class="button button--small">Send us a message</a>
                    </div>
                </div>
            </div>
        </section>
        
        <article id="contact">
            <div class="container">
                <div class="contactinfo">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.744771300416!2d57.61376531456015!3d-20.019223946259046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x54448e42bb477b61!2zMjDCsDAxJzA5LjIiUyA1N8KwMzYnNTcuNCJF!5e0!3m2!1sen!2smu!4v1660234193983!5m2!1sen!2smu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>		
                </div>
                <div class="contactForm">
                    <form method="POST">
                        <h2>Send a Message</h2>
                        <div class="formBox">
                            <div class="inputBox w50">
                                <input type="text" name="firstname" id="firstname" required>
                                <span>First Name</span>
                            </div>
                            <div class="inputBox w50">
                                <input type="text" name="lastname" id="lastname" required>
                                <span>Last Name</span>
                            </div>
                            <div class="inputBox w50">
                                <input type="text" name="email" id="email" required>
                                <span>Email Address</span>
                            </div>
                            <div class="inputBox w50">
                                <input type="text" name="mobile" id="mobile" required>
                                <span>Mobile Number</span>
                            </div>
                            <div class="inputBox w100">
                                <textarea name="message" id="message" required></textarea>
                                <span>Write your message here...</span>
                            </div>
                            
                            <?php 
                                if(isset($_SESSION['error'])){
                                    echo "<div class='alertmsg'>".$_SESSION['error']."</div>";
                                    
                                    unset($_SESSION['error']);
                                }
                            ?>

                            <div class="inputBox w100">
                                <input type="submit" name="btnMessage" id="submit" value="Send">
                            </div>
                        </div>
                    </form>
                    <div id="result"></div>
                </div>
            </div>
        </article>
        

        <!--==================== NEWSLETTER ====================-->
        <section class="newsletter section container">
            <div class="newsletter__bg grid">
                <div>
                    <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
                    <p class="newsletter__description">
                        Don't miss out on your discounts. Subscribe to our email 
                        newsletter to get the best offers, discounts, coupons, 
                        gifts and much more.
                    </p>
                </div>

                <form action="" class="newsletter__subscribe">
                    <input type="email" placeholder="Enter your email" class="newsletter__input">
                    <button class="button">
                        SUBSCRIBE
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Our information</h3>

                <ul class="footer__list">
                    <li>1234 - Peru</li>
                    <li>La Libertad 43210</li>
                    <li>123-456-789</li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">About Us</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Copy Right</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Product</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Road bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Mountain bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Electric</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Accesories</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Social</h3>

                <ul class="footer__social">
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-twitter' ></i>
                    </a>

                    <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                </ul>
            </div>
        </div>

        <span class="footer__copy">&#169; ROLEX. All rigths reserved</span>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/productcart.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="contactscript.js"></script>

    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</body>
</html>