<?php
    session_start();
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
    <link rel="stylesheet" href="assets/css/about.css">

    <title>ABOUT | Rolex Watch</title>
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
                        <a href="aboutus.php" class="nav__link active-link">About us</a>
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
        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <div class="about__container container grid">
                <div class="about__data">
                    <h2 class="section__title about__title">More Information <br> About The Rolex Team</h2>
                    <p class="about__description">Our enthusiasm combined with continuous 
                        practical training provides us with the expertise you are looking for 
                        when selecting a memorable timepiece for your loved one.
                    </p>
                    <a href="#story" class="button">Read More</a>
                </div>

                <div class="about__img">
                    <div class="about__img-overlay">
                        <img src="assets/img/about4.jpg" alt="" class="about__img-one">
                    </div>

                    <div class="about__img-overlay">
                        <img src="assets/img/about5.jpg" alt="" class="about__img-two">
                    </div>
                </div>
            </div>
        </section>

        

        <!--==================== STORY ====================-->
        <section class="story section container" id="story">
            <div class="story__container grid">
                <div class="story__data">
                    <h2 class="section__title story__section-title">
                        Our Rolex Team
                    </h2>

                    <h1 class="story__title">
                        The Raffi Jewellers <br> Team
                    </h1>

                    <p class="story__description">
                        At Raffi Jewellers in Cambridge Ontario, we are passionate about the Rolex 
                        collection of prestigious, high-precision timepieces. 
                    </p>

                    <a href="products.php" class="button button--small">Discover</a>
                </div>

                <div class="story__images">
                    <img src="assets/img/story2.jpg" alt="" class="story__img">
                    <div class="story__square"></div>
                </div>
            </div>
        </section>
        <section class="story section container">
            <div class="story__container grid">
                <div class="story__data">
                    <h2 class="section__title story__section-title">
                        Build to last
                    </h2>

                    <h1 class="story__title">
                        A garantee of <br> Rolex durability
                    </h1>

                    <p class="story__description">
                        A Rolex watch can keep working, being handed down from one generation 
                        to the next, and living several lives.
                    </p>

                    <a href="products.php" class="button button--small">Discover</a>
                </div>

                <div class="story__images2">
                    <img src="assets/img/story4.jpg" alt="" class="story__img2">
                    <div class="story__square2"></div>
                </div>
            </div>
        </section>
        <section class="story section container">
            <div class="story__container grid">
                <div class="story__data">
                    <h2 class="section__title story__section-title">
                        Our Story
                    </h2>

                    <h1 class="story__title">
                        Inspirational Watch of <br> this year
                    </h1>

                    <p class="story__description">
                        The latest and modern watches of this year, is available in various 
                        presentations in this store, discover them now.
                    </p>

                    <a href="products.php" class="button button--small">Discover</a>
                </div>

                <div class="story__images">
                    <img src="assets/img/story.png" alt="" class="story__img">
                    <div class="story__square"></div>
                </div>
            </div>
        </section>

        <!--==================== EXPERIENCE ====================-->
        <section class="experience section">
            <h2 class="section__title">With Our Experience <br> We Will Serve You</h2>

            <div class="experience__container container grid">
                <div class="experience__content grid">
                    <div class="experience__data">
                        <h2 class="experience__number">200</h2>
                        <span class="experience__description">Years <br> Experience</span>
                    </div>

                    <div class="experience__data">
                        <h2 class="experience__number">750</h2>
                        <span class="experience__description">Authorised <br> Retailers</span>
                    </div>

                    <div class="experience__data">
                        <h2 class="experience__number">6500+</h2>
                        <span class="experience__description">International <br> Watchmakers</span>
                    </div>
                </div>

                <div class="experience__img grid">
                    <div class="experience__overlay">
                        <img src="assets/img/experience1.jpg" alt="" class="experience__img-one">
                    </div>
                    
                    <div class="experience__overlay">
                        <img src="assets/img/experience2.jpg" alt="" class="experience__img-two">
                    </div>
                </div>
            </div>
        </section>

        <!--==================== TESTIMONIAL ====================-->
        <section class="testimonial section container">
            <div class="testimonial__container grid">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        <div class="testimonial__card swiper-slide">
                            <div class="testimonial__quote">
                                <i class='bx bxs-quote-alt-left' ></i>
                            </div>
                            <p class="testimonial__description">
                                They are the best watches that one acquires, also they are always with the latest 
                                news and trends, with a very comfortable price and especially with the attention 
                                you receive, they are always attentive to your questions.
                            </p>
                            <h3 class="testimonial__date">March 27. 2021</h3>
    
                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial1.jpg" alt="" class="testimonial__perfil-img">
    
                                <div class="testimonial__perfil-data">
                                    <span class="testimonial__perfil-name">Lee Doe</span>
                                    <span class="testimonial__perfil-detail">Director of a company</span>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial__card swiper-slide">
                            <div class="testimonial__quote">
                                <i class='bx bxs-quote-alt-left' ></i>
                            </div>
                            <p class="testimonial__description">
                                They are the best watches that one acquires, also they are always with the latest 
                                news and trends, with a very comfortable price and especially with the attention 
                                you receive, they are always attentive to your questions.
                            </p>
                            <h3 class="testimonial__date">March 27. 2021</h3>
    
                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial2.jpg" alt="" class="testimonial__perfil-img">
    
                                <div class="testimonial__perfil-data">
                                    <span class="testimonial__perfil-name">Samantha Mey</span>
                                    <span class="testimonial__perfil-detail">Director of a company</span>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial__card swiper-slide">
                            <div class="testimonial__quote">
                                <i class='bx bxs-quote-alt-left' ></i>
                            </div>
                            <p class="testimonial__description">
                                They are the best watches that one acquires, also they are always with the latest 
                                news and trends, with a very comfortable price and especially with the attention 
                                you receive, they are always attentive to your questions.
                            </p>
                            <h3 class="testimonial__date">March 27. 2021</h3>
    
                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial3.jpg" alt="" class="testimonial__perfil-img">
    
                                <div class="testimonial__perfil-data">
                                    <span class="testimonial__perfil-name">Raul Zaman</span>
                                    <span class="testimonial__perfil-detail">Director of a company</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="swiper-button-next">
                        <i class='bx bx-right-arrow-alt' ></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class='bx bx-left-arrow-alt' ></i>
                    </div>
                </div>

                <div class="testimonial__images">
                    <div class="testimonial__square"></div>
                    <img src="assets/img/testimonial.png" alt="" class="testimonial__img">
                </div>
            </div>
        </section>

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

    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>