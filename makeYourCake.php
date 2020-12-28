<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | MAKE YOUR CAKE</title>
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
    </head>

    <body>
        <?php $page = 'makeyourcake';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
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