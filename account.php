<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Sanjana.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <!--Start Navigation Bar-->
        <?php $page = 'account';?>
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
                        <li><a href="login.php" class="<?php if($page == 'login'){echo 'active';}?>" class="user-button"><i class="far fa-user-circle"></i></a></li>
                    </ul>
                </nav>
        </header>
        <!--End Navigation Bar @media 1200px-->

        
        <!--Start Wave Image-->
        <div class="wave-image-group">
            <div class="wave-image footer-wave">
                <img src="Assets/images/1.index/NavBar_WavePink.png">
            </div>
        </div>
        <!--End Wave Image-->


        <!--Start Footer-->
        <footer class="footer-group">

            <div class="footer">

                <div class="logo">
                    <span class="logo-name">MALAKO</span>
                </div>
            
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

                <hr size="2px" width="80%" color="white">
                <hr size="2px" width="80%" color="white">

                <div class="contact-links">
                    <span class="phone"><i class="fas fa-phone-square-alt"></i> 5758 XXXX</span>
                    <span class="address">Patisserie Malako At Jerningham and Royal Street</span>
                </div>

                <div class="legal-links">
                    <span class="privacy-policy"><b><a href=#>PRIVACY POLICY</a></b></span>
                    <span class="term-of-use"><b><a href=#>TERMS OF USE</a></b></span>
                </div>

                <div class="copyright">
                    <span class="copyright-text">&#169; 2020 Design by Atish & Sanjana</span>
                </div>

            </div>  

        </footer>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <div class="bottom-nav-group">
            <nav class="bottom-nav">
                <a href="login.html" class="bottom-nav-link">
                    <i class="fas fa-user bottom-nav-icon" ></i>
                    <span class="bottom-nav-text">Account</span>
                </a>
                <a href="#" class="bottom-nav-link">
                    <i class="fas fa-search"></i>
                    <span class="bottom-nav-text">Search</span>
                </a>
                <a href="#" class="bottom-nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="bottom-nav-text">My Cart</span>
                </a> 
            </nav>
        </div>
        <!-- End Bottom Nav -->
    </body>
</html>