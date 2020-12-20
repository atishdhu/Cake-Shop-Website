<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>MALAKO | Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    <?php 
        include_once 'connection.php';
    ?>

    <!--========== CSS FILES ==========-->
    <link rel="stylesheet" type="text/css" href="sanj2.css">
  
    <link href="jquery.nice-number.css" rel="stylesheet">
    <!--========== JQUERY CDN ==========-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="jquery.nice-number.js"> </script>
    <script type="text/javascript"> 
    $(function(){
        $('input[type="number"]').niceNumber();
    });
    </script>


    <!--========== BOOTSTRAP ==========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- <link rel='stylesheet' type='text/css' href='style.php' /> -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--========== BOXICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
          <!--========== PHP QUERIES ==========-->
        <?php 
            
            $Q_fetch_featured = "SELECT * FROM products WHERE p_type_id = 2 ; ";//selects featured products
            $Q_fetch_new =  "SELECT * FROM products WHERE p_type_id = 1 ; ";//selects new products
            $Q_fetch_product_details =  "SELECT * FROM products WHERE p_id = 1 ; ";//selects product with id =1
        
        ?>


          <!--========== HEADER ==========-->
        <!--Start Navigation Bar-->
        
        <header class="main-header">
            <nav class="nav main-nav details-header">

                <input type="checkbox" id="check">

                <div class="display_view">
                    <label for="check" class="checkbtn">
                        <i class="fas fa-bars animate__animated animate__backInDown"></i>
                    </label>
                    <a href="cart.php"><i class="bx bx-cart nav__cart animate__animated animate__backInDown"></i><p class="cart-number-mob">3</p></a>
                    <h1 class="business-name"><a href="index.html" class="animate__animated animate__backInDown">M A L A K O</a></h1>
                </div>

                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a class="active" href="products.php">PRODUCTS</a></li>
                    <li><a href="makeyourcake.html">MAKE YOUR CAKE</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
                </ul>

                
            </nav>
        </header>
        
        <!--End Navigation Bar-->
        <!--Start Navigation Bar @media 1200px-->
        <header class="main-header-media1200">
            <nav class="nav-media1200 main-nav-media1200 details-header" >

                <h1 class="business-name-media1200"><a href="index.html" class="animate__animated animate__backInDown">Malako</a></h1>

                <ul class="animate__animated animate__backInDown">
                    <li><a href="index.html">HOME</a></li>
                    <li><a class="" href="products.php">PRODUCTS</a></li>
                    <li><a href="makeyourcake.html">MAKE YOUR CAKE</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
                    <li><a href="cart.php"><i class="bx bx-cart nav__cart" id="cart__active"></i><p class="cart-number">3</p></a></li> <!--cart icon-->
                    
                </ul>

                


                
            </nav>
        </header>

        <!--End Navigation Bar @media 1200px-->
          
        <!--========== CART STRUCTURE ==========-->
        <div class="row mx-auto">
            <!-- Cart items -->
            <div class="col-lg ">

                <!-- title -->
                <div class="row-md mx-auto px-auto title-cart">
                    <h1>M Y &nbsp C A R T</h1>
                </div>

                <div class="cart_title_bar mx-1 ">
                    <div class="cart-title-1">
                        <h2 class="section-title hide-wave"> </h2>
                    </div>
                    <div class="cart-title-2">
                        <h4 class="section-all my-0 py-0 hide-wave">Item Details</h4>
                    </div>
                    <div class="cart-title-3">
                        <h4 class="section-all my-0 py-0 hide-wave">Quantity</h4>
                    </div>
                   
                    <div class="cart-title-4">
                        <h4 class="section-all my-0 py-0 hide-wave">Total Price (Rs)</h4>
                    </div>
                    <div class="cart-title-5">
                        <h4 class="section-all my-0 py-0 hide-wave">Remove</h4>
                    </div>
                    
                </div>


                <!-- Receipt item card -->
                <div class="receipt-card my-2 mx-1 py-3">
                    <!-- product image -->
                    <div class=" cart_img">
                        <img src="Assets\images\products\Cake_2.jpg" class="img-fluid">
                    </div>

                    <!-- product details -->
                    <div class="">
                        <!-- product name -->
                        <div class="product-name">
                            <div class="product-name-det">
                                <h6>Cheese Cake</h6>
                                <h6>Rs 400</h6>
                            </div>
                        </div>
                    </div>

                        <!-- quantity -->
                        <div class="quantity-value">
                             <h6>3</h6>
                        </div>


                    <!-- product total price -->
                    <div class="tot-price-per-item ">
                        <h6>Rs 1200</h6>
                    </div>

                      <!-- Remove -->
                    <div class="remove-button">
                        
                        <button type="button" class="btn btn-primary btn-lg my-4 button rem-but"> X </button>
                        
                    </div>
                </div>
            </div>

            <!-- Receipt -->
            <div class="col-md container receipt-area mx-auto">
                <!-- Summary -->
                <div class="row summary-area">
                    <h1 class="subtitle">SUMMARY</h1>
                </div>
                <div class="row container receipt-data mx-auto pt-3">
                    <!-- subtotal -->
                    <div class="row container subtotal-area my-1">
                        <div class="col">
                            <h4 class="subtitle text-left title-checkout">SUBTOTAL: </h4>
                        </div>
                        <div class="col"><h4 class="subtitle text-left">Rs</h4></div>
                        <div class="col">
                            <h4 class="subtitle text-right">400.00</h4>
                        </div>
                    </div>
                    <!-- delivery -->
                    <div class="row container delivery-area my-1">
                        <div class="col">
                            <h4 class="subtitle text-left title-checkout">DELIVERY: </h4>
                        </div>
                        <div class="col"><h4 class="subtitle text-left">Rs</h4></div>
                        <div class="col">
                            <h4 class="subtitle text-right">70.00</h4>
                        </div>
                    </div>
                    <!-- total -->
                    <div class="row container total-area my-1 pt-2">
                        <div class="col">
                            <h4 class="subtitle text-left title-checkout">TOTAL: </h4>
                        </div>
                        <div class="col"><h4 class="subtitle text-left">Rs</h4></div>
                        <div class="col">
                            <h4 class="subtitle text-right">470.00</h4>
                        </div>
                    </div>
                    
                    
                    <!-- checkout -->
                    <div class="row checkout-area">
                        <button type="button" class="btn btn-primary btn-lg my-4 button">Checkout</button>
                    </div>
                </div>
            </div>

        </div>

           
        <!--========== FOOTER ==========-->
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
        <!--========== BOTTOM-MENU-PHONE ==========-->
        <!-- Start Bottom Nav -->
        <div class="bottom-nav-group">
            <nav class="bottom-nav">
                <a href="#" class="bottom-nav-link bottom-nav-active">
                    <i class="fas fa-user bottom-nav-icon"></i>
                    <span class="bottom-nav-text">Account</span>
                </a>
                <a href="#" class="bottom-nav-link">
                    <i class="fas fa-search"></i>
                    <span class="bottom-nav-text">Search</span>
                </a>
                <a href="#" class="bottom-nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="bottom-nav-text">Cart</span>
                </a>
            </nav>
        </div>
        <!-- End Bottom Nav -->

        <script src="Javascript\main.js?<?php echo filemtime('Javascript\main.js'); ?>" ></script>
    </body>
</html>