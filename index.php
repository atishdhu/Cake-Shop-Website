<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | HOME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="Javascript/swapWaveImg.js"></script>
        <!-- COUNTDOWN FUNCTION JAVASCRIPT BY SANJANA -->
        <script src = "Javascript/countdown_sales.js"></script>
    </head>

    <body>
        <?php $page = 'index'?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Wave Image-->
        <div class="wave-image-group-media1200">
            <div class="wave-image-flip-media1200">
                <img src="Assets/images/1.index/NavBar_WaveWhiteThinFlip.png">
            </div>
        </div>
        <!--End Wave Image-->


        <!--Start Slideshow-->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
            <img src="Assets/images/1.index/Cake_1.jpg" style="width:100%">
            <div class="text">EVERY BATCH FROM SCRATCH</div>
            </div>
        
            <div class="mySlides fade">
            <img src="Assets/images/1.index/Cake_2.jpg" style="width:100%">
            <div class="text">WE IMPLEMENT SWEET DREAMS</div>
            </div>
        
            <div class="mySlides fade">
            <img src="Assets/images/1.index/Cake_3.jpg" style="width:100%">
            <div class="text">A LITTLE BLISS IN EVERY BITE</div>
            </div>
            
        </div>

        <script src="Javascript/SlideshowAuto.js"></script>
        <!--End Slideshow -->

        
        <!--Start Wave Image-->
        <div class="wave-image-group">
            <div class="wave-image">
                <img src="Assets/images/1.index/NavBar_WaveWhite.png">
            </div>
        </div>
        <!--End Wave Image-->

        <!--Start What You Can Do-->
        <div class="what-you-can-do">
            <div class="subtitle">
                <h2>WHAT YOU CAN DO</h2>
            </div>

            <div class="row">

                <div class="column">
                    <i class="fas fa-cookie"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle buy-our-cake">Freshly baked cakes</span>
                    <span class="what-you-can-do-text">Get a taste of our freshly prepared cakes by ordering online!</span>
                </div>

                <div class="column">
                    <i class="fas fa-mitten"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle customize-cake">Customize your cake</span>
                    <span class="what-you-can-do-text">You can customize your cake with your favourite glazing, toppings, color and more!</span>
                </div>
                
                <div class="column">
                    <i class="fas fa-boxes"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle create-box">Custom cake box</span>
                    <span class="what-you-can-do-text">You can add different types of cakes in a box and we deliver it to you!</span>
                </div>

            </div>
         </div>

        </div>
        <!--End What You Can Do-->
       
        
        <!--Start Special Offer-->
        <section class="offer-section">
            <div class="offer-bg">
                <div class="offer-data">
                    <div class="subtitle">
                        <h2>SPECIAL OFFER</h2>
                    </div>
                    <p class="offer-description">Extreme Christmas Sales ends in: </p>
                    <p class="offer-description" id="countdown" style="font-family: Old Standard TT; font-size: 2rem;">Sales countdown</p>

                    <div class="subscribe-button-container">
                        <a href="products.php"><button class="subscribe-button" name="subscribe">SHOP NOW</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!--End Special Offer-->


        <!--Start Wave Image-->
        <!-- <div class="wave-image-group">
            <div class="wave-image">
                <img src="Assets/images/1.index/NavBar_WaveWhite.png">
            </div>
        </div> -->
        <!--End Wave Image-->


        <!--Start How to Order-->
        <div class="how-to-order">
            <div class="subtitle">
                <h2 class="order-subtitle">HOW TO ORDER</h2>
            </div>
            <div class="row" style="color: #FF7380FF;">
                <div class="column">
                  <i class="fas fa-birthday-cake"></i>
                  <p><b>Choose your cake</b></p>
                </div>
                <div class="column">
                  <i class="fas fa-cart-plus"></i>
                  <p><b>Add to cart</b></p>
                </div>
                <div class="column">
                  <i class="fas fa-money-check-alt"></i>
                  <p><b>Checkout</b></p>
                </div>
                 <div class="column">
                 <i class="fas fa-box-open"></i>
                 <p><b>We pack it up</b></p>
                </div>
                  <div class="column">
                  <i class="fas fa-shipping-fast"></i>
                  <p><b>Fast Delivery</b></p>
                </div>
            </div>
         </div>
        <!--End How to Order-->


        <!--Start Wave Image Flip-->
        <div class="wave-image-group">
            <div class="wave-image-flip how-to-order-wave">
                <img src="Assets/images/1.index/NavBar_WaveWhiteFlip.png">
            </div>
        </div>
        <!--End Wave Image Flip-->


        <!-- Start Our Baker-->
        <div class="our-baker">

            <div class="subtitle">
                <h2>OUR BAKERS</h2>
            </div>
            
            <div class="all-helper-info-index">
                <div class="helper-individual-index">
                    <div class="helper-group helper0">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>SARAH CONNOR</b></p>
                            <p class="hierarchy">CEO - Malako Bakery Shop</p>
                            <p class="description">Jelly topping halvah caramels sweet cake gummi bears toffee.</p>
                        </div>
        
                        <div class="helper-social-media">
                            <div class="social-media">
                                <span class="facebook">
                                    <a href=#><i class="fab fa-facebook-square"></i></a>
                                </span>
                                <span class="twitter">
                                    <a href=#><i class="fab fa-twitter-square"></i></a>
                                </span>
                                <span class="instagram">
                                    <a href=#><i class="fab fa-instagram-square"></i></a>
                                </span>
                                <span class="pinterest">
                                    <a href=#><i class="fab fa-pinterest-square"></i></a>
                                </span>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="helper-individual-index">
                    <div class="helper-group helper1">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>JUAN OLSON</b></p>
                            <p class="hierarchy">CO-FOUNDER</p>
                            <p class="description">Jelly topping halvah caramels sweet cake gummi bears toffee.</p>
                        </div>
        
                        <div class="helper-social-media">
                            <div class="social-media">
                                <span class="facebook">
                                    <a href=#><i class="fab fa-facebook-square"></i></a>
                                </span>
                                <span class="twitter">
                                    <a href=#><i class="fab fa-twitter-square"></i></a>
                                </span>
                                <span class="instagram">
                                    <a href=#><i class="fab fa-instagram-square"></i></a>
                                </span>
                                <span class="pinterest">
                                    <a href=#><i class="fab fa-pinterest-square"></i></a>
                                </span>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="helper-individual-index">
                    <div class="helper-group helper2">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>AGNES BUCHANAN</b></p>
                            <p class="hierarchy">MASTER BAKER</p>
                            <p class="description">Jelly topping halvah caramels sweet cake gummi bears toffee.</p>
                        </div>
        
                        <div class="helper-social-media">
                            <div class="social-media">
                                <span class="facebook">
                                    <a href=#><i class="fab fa-facebook-square"></i></a>
                                </span>
                                <span class="twitter">
                                    <a href=#><i class="fab fa-twitter-square"></i></a>
                                </span>
                                <span class="instagram">
                                    <a href=#><i class="fab fa-instagram-square"></i></a>
                                </span>
                                <span class="pinterest">
                                    <a href=#><i class="fab fa-pinterest-square"></i></a>
                                </span>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- End Our Baker-->


        <!-- Start Google Map-->
        <?php include './Includes/GoogleMap.php';?>
        <!-- End Google Map-->


        <!-- Start Contact Us -->
        <?php include './Includes/ContactUsForm.php';?>
        <!-- End Contact Us-->
        

        <!--Start Newsletter-->
        <?php include './Includes/NewsLetter.php';?>
        <!--End Newsletter-->


        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Bottom Nav -->

    </body>
</html>