<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | ABOUT US</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <!--Start Navigation Bar-->
        <?php $page = 'about';?>
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
                        <li><a href="login.php" class="<?php if($page == 'login'){echo 'active';}?> user-button"><i class="far fa-user-circle"></i></a></li>
                    </ul>
                </nav>
        </header>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Page Header-->
        <div class="about-us-header">
            <div class="banner-group">
                <div class="banner"></div>
            </div>
            
            <div class="about-us-subtitle">
                <span>ABOUT US</span>
            </div>
        </div>
        <!--End Page Header-->


        <!--Start Baker Info-->
        <div class="baker-info-group">
            <div class="baker-info-container">
                <div class="baker-info-text">
                    <div class="baker-info-title">
                        <span>Our Baker</span>
                    </div>
        
                    <div class="baker-name">
                        <span>Ms. Sarah Connor</span>
                    </div>
        
                    <div class="baker-description">
                        <p>“Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder. Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake. Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin topping muffin brownie…”</p>
                    </div>
        
                    <div class="baker-signature">
                        <div class="signature-photo"></div>
                    </div>
        
                    <div class="baker-position">
                        <span>CEO - Malako Bakery Shop</span>
                    </div>
                </div>
                
                <div class="baker-photo-group">
                    <div class="baker-photo"></div>
                </div>
            </div>
        </div>
        <!--End Baker Info-->


        <!--Start Awards-->
        <div class="award-section">
            <div class="award-title">
                <span>Our Rewards</span>
            </div>

            <div class="award-subtitle">
                <span>WINNER AWARDS</span>
            </div>

            <div class="award-badge-container">
                <div class="award-badge-group">
                    <div class="badge badge1">
                        <div class="badge-photo-group">
                            <div class="badge-photo"></div>
                        </div>
                        
                        <div class="badge-info">
                            <span class="badge-title">BAKERY OF THE MONTH</span>
                            <span class="badge-date">2010-2012</span>
                            <p class="badge-description">Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie. Jujubes chocolate cake sesame snaps</p>
                        </div>
                    </div>
                </div>
    
                <div class="award-badge-group">
                    <div class="badge badge2">
                        <div class="badge-photo-group">
                            <div class="badge-photo"></div>
                        </div>
                        
                        <div class="badge-info">
                            <span class="badge-title">BAKERY OF THE MONTH</span>
                            <span class="badge-date">2010-2012</span>
                            <p class="badge-description">Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie. Jujubes chocolate cake sesame snaps</p>
                        </div>
                    </div>
                </div>
    
                <div class="award-badge-group">
                    <div class="badge badge3">
                        <div class="badge-photo-group">
                            <div class="badge-photo"></div>
                        </div>
                        
                        <div class="badge-info">
                            <span class="badge-title">BAKERY OF THE MONTH</span>
                            <span class="badge-date">2010-2012</span>
                            <p class="badge-description">Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie. Jujubes chocolate cake sesame snaps</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Awards-->

        <!--Start Team Info-->
        <div class="team-section">
            <div class="team-title">
                <span>Golden Hand</span>
            </div>

            <div class="team-subtitle">
                <span>OUR TEAM</span>
            </div>

            
            <div class="all-helper-info">
                <div class="helper-individual">
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
                
                <div class="helper-individual">
                    <div class="helper-group helper2">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>AGNES BUCHANAN</b></p>
                            <p class="hierarchy">Master Baker</p>
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
        <!--End Team Info-->


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