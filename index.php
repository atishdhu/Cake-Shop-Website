<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="Javascript/swapWaveImg.js"></script>
    </head>

    <body>
        <!--Start Navigation Bar-->
        <?php $page = 'index'?>
        <header class="main-header">
            <nav class="nav main-nav">

                <input type="checkbox" id="check">
                
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars animate__animated animate__backInDown"></i>
                </label>

                <h1 class="business-name"><a href="index.html" class="animate__animated animate__backInDown">Malako</a></h1>

                <ul>
                    <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>" href="index.php">HOME</a></li>
                    <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>" href="products.php">PRODUCTS</a></li>
                    <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>" href="makeyourcake.php">MAKE YOUR CAKE</a></li>
                    <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>" href="about.php">ABOUT</a></li>
                    <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>" href="contact.php">CONTACT US</a></li>
                </ul>
            </nav>
        </header>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <header class="main-header-media1200">
            <nav class="nav-media1200 main-nav-media1200">

                <h1 class="business-name-media1200"><a href="index.php" class="animate__animated animate__backInDown">Malako</a></h1>

                <ul class="animate__animated animate__backInDown">
                    <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>">HOME</a></li>
                    <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>">PRODUCTS</a></li>
                    <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>">MAKE YOUR CAKE</a></li>
                    <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>">ABOUT</a></li>
                    <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>">CONTACT US</a></li>
                    <li><a href="#" class="user-button"><i class="bx bx-cart nav__cart"></i></a></li>
                    <li><a href="login.php" class="<?php if($page == 'login'){echo 'active';}?>" id="user-button"><i class="far fa-user-circle"></i></a></li>
                </ul>
            </nav>
        </header>
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
                    <i class="fas fa-cookie"></i>
                    <span class="what-you-can-do-subtitle buy-our-cake">Freshly baked cakes</span>
                    <span class="what-you-can-do-text">Get a taste of our freshly prepared cakes by ordering online!</span>
                </div>

                <div class="column">
                    <i class="fas fa-mitten"></i>
                    <span class="what-you-can-do-subtitle customize-cake">Customize your cake</span>
                    <span class="what-you-can-do-text">You can customize your cake with your favourite glazing, toppings, color and more!</span>
                </div>
                
                <div class="column">
                    <i class="fas fa-boxes"></i>
                    <span class="what-you-can-do-subtitle create-box">Custom cake box</span>
                    <span class="what-you-can-do-text">You can add different types of cakes in a box and we deliver it to you!</span>
                </div>

            </div>
         </div>

        </div>
        <!--End What You Can Do-->


         <!--Start Wave Image Flip-->
        <div class="wave-image-group">
            <div class="wave-image-flip">
                <img src="Assets/images/1.index/NavBar_WaveWhiteFlip.png">
            </div>
        </div>
        <!--End Wave Image Flip-->


        <!--Start Products List-->
        <div class="all-cakes">

            <div class="subtitle">
                <h2>SPECIAL OFFERS</h2>
            </div>
            
            <div class = "all-hot-cakes">
                <div class ="hot-cake-group">
                    <div class="cake1 hot-cake">
                        <div class="hot-cake-baseInfo" style="background-image: url(./Assets/images/1.index/Cupcake.png)">
                            <span class="price">Rs250</span>
                            <span class="name">Cupcake</span>
                        </div>
                        <div class="hot-cake-description">
                            <span>Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.</span>
                        </div>
                    </div>
                </div>

                <div class ="hot-cake-group">
                    <div class="cake2 hot-cake">
                        <div class="hot-cake-baseInfo" style="background-image: url(./Assets/images/1.index/Cupcake.png)">
                            <span class="price">Rs250</span>
                            <span class="name">Cupcake</span>
                        </div>
                        <div class="hot-cake-description">
                            <span>Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.</span>
                        </div>
                    </div>
                </div>

                <div class ="hot-cake-group">
                    <div class="cake3 hot-cake">
                        <div class="hot-cake-baseInfo" style="background-image: url(./Assets/images/1.index/Cupcake.png)">
                            <span class="price">Rs250</span>
                            <span class="name">Cupcake</span>
                        </div>
                        <div class="hot-cake-description">
                            <span>Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.</span>
                        </div>
                    </div>
                </div>

                <div class ="hot-cake-group">
                    <div class="cake4 hot-cake">
                        <div class="hot-cake-baseInfo" style="background-image: url(./Assets/images/1.index/Cupcake.png)">
                            <span class="price">Rs250</span>
                            <span class="name">Cupcake</span>
                        </div>
                        <div class="hot-cake-description">
                            <span>Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="push-button">
                <button class="view-all-cakes">View All Cakes</button>
            </div>
        
        </div>
        <!--End Products List-->


        <!--Start Wave Image-->
        <div class="wave-image-group">
            <div class="wave-image">
                <img src="Assets/images/1.index/NavBar_WaveTeal.png">
            </div>
        </div>
        <!--End Wave Image-->


        <!--Start How to Order-->
        <div class="how-to-order">
            <div class="subtitle">
                <h2 class="order-subtitle">HOW TO ORDER</h2>
            </div>
            <div class="row">
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
                <img src="Assets/images/1.index/NavBar_WaveTealFlip.png">
            </div>
        </div>
        <!--End Wave Image Flip-->


        <!-- Start Our Baker-->
        <div class="our-baker">

            <div class="subtitle">
                <h2>OUR BAKER</h2>
            </div>
            
            <div class="baker-container">
                <div class="baker-profile-group">
                    <!-- Contains bakers profile picture -->
                    <div class="baker-pic-group">
                        <div class="baker-pic"></div>
                    </div>

                    <div class = "baker-more-about">
                        <p class="name"><b>SARAH CONNOR</b></p>
                        <p class="hierarchy">CEO-FOUNDER</p>
                        <p class="description">Jelly topping halvah caramels sweet cake gummi bears toffee.</p>
                    </div>   
                </div>
                    
                <article class="baker-info">
                    <p>
                        We all have those moments in our lives when we feel as if everything needs to be exactly right.
        <br><br>Dessert tiramisu tart donut macaroon. Gummi bears lollipop marzipan. Caramels gummi bears icing jelly beans cheesecake brownie topping candy sugaplum.
                    </p>
                </article>
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