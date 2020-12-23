<?php define('Access', TRUE);?>

<!-- <?php
// Start the session
session_start();
// if($_SESSION['p_id']!=""){
//     unset($_SESSION['p_id']);   
//     // $_SESSION['p_id'] = $_REQUEST['p_id'];  
//     $_SESSION['p_id'] = $_GET['id'];
//     }
//     else {
//     $_SESSION['p_id'] = $_REQUEST['p_id'];  
//     }

?> -->

<!DOCTYPE html>
<html lang="en-MU">
<head>
    <meta charset="utf-8">
    <title>MALAKO | Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    <?php 
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FILE ==========-->
    
    <link rel='stylesheet' type='text/css' href='sanj2.css' />

     <!--========== BOOTSTRAP ==========-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

 

    <!-- <link rel='stylesheet' type='text/css' href='style.php' /> -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--========== BOXICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<!--___________________________________________________________________________-->

<body>

    <!--========== PHP QUERIES ==========-->
    <?php 
        
        $Q_fetch_featured = "SELECT * FROM products WHERE p_type_id = 2 ; ";//selects featured products
        $Q_fetch_new =  "SELECT * FROM products WHERE p_type_id = 1 ; ";//selects new products
        $Q_fetch_categories = "SELECT * FROM product_categories"; //selects all categories
    
    ?>


    <!--========== HEADER ==========-->
    <!--Start Navigation Bar-->
    <header class="main-header">
        <nav class="nav main-nav">

            <input type="checkbox" id="check">


            <!--<label for="check" class="checkbtn">
                <i class="fas fa-bars animate__animated animate__backInDown"></i>
            </label>-->

            <div class="display_view">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars animate__animated animate__backInDown"></i>
                </label>
                <a href="cart.php">
                    <i class="bx bx-cart nav__cart animate__animated animate__backInDown"></i>
                    <p class="cart-number-mob"><?php echo $_SESSION['item_quantity']; ?></p>
                </a>
                <h1 class="business-name"><a href="index.html" class="animate__animated animate__backInDown">M A L A K O</a></h1>
            </div>

           


            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a class="active" href="products.php">PRODUCTS</a></li>
                <li><a href="makeyourcake.php">MAKE YOUR CAKE</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
            </ul>



        </nav>
    </header>
    <!--End Navigation Bar-->

    <!--Start Navigation Bar @media 1200px-->
    <?php include './Includes/PcNavBar.php';?>
    <!--End Navigation Bar @media 1200px-->

    <!--Start Wave Image-->
    <div class="wave-image-group hide-wave">
        <div class="wave-image footer-wave">
            <img src="Assets/images/1.index/NavBar_WavePink.png">
        </div>
    </div>
    <!--End Wave Image-->
    <!--___________________________________________________________________________-->

    
    
    <main class="1-main">

        <!--========== OFFER 1 ==========-->

        <section class="offer section offer__top mt-2">
            <div class="offer__bg2 offer__1bg">
                <div class="offer__data ">
                    <h2 class="offer__title">50% OFF ON ALL CAKES!!!</h2>
                    <p class="offer__description">1st - 31st DECEMBER 2020<br />HURRY UP, DON'T MISS YOUR CHANCE!!!</p>

                    <a href="products.php" class="button button__round">SHOP NOW</a>
                </div>
            </div>
        </section>

        <!--Start Wave Flip Image-->
        <div class="">
            <div class="">
                <img src="Assets/images/1.index/NavBar_WavePinkFlip.png">
            </div>
        </div>
        <!--End Wave Flip Image-->

        <!--========== CATEGORIES BUTTON ==========-->
        <?php 
        
        $result_cat = mysqli_query($conn, $Q_fetch_categories);

        ?>
        <div class="row category-title" style="margin-top: 1rem;">
                <div class="col">
                    <h2 class="category">FEATURED</h2>
                    <h2 class="category-name ">Products</h2>
                </div>
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <?php
                        while($row_categories = mysqli_fetch_assoc($result_cat)){
                            $p_cat_id = $row_categories['p_cat_id'];
                            ?>
                            <a href="products_category.php?p_cat_id=<?php echo $p_cat_id; ?>"><?php echo $row_categories['p_cat_name']; ?></a>
                            <?php
                        }
                        
                        ?>
                    </div>
                </div>
            </div>


        

        <!--========== ATTEMPT TO QUERY FEATURED PRODUCTS ==========-->

        <section class="featured section" id="featured">
            <!-- <h2 class="section-title">FEATURED PRODUCTS-PHP method</h2>
            <a href="#" class="section-all">View All</a> -->

            <div class="featured__container bd-grid">

                <?php 
                     $result = mysqli_query($conn, $Q_fetch_featured);
                     $check = mysqli_num_rows($result);
             
                
                    if($check>0){
                        
                        while($featured_row = mysqli_fetch_assoc($result)){
                            $product_id = $featured_row['p_id'];

                            
                            ?>

                                <div class="featured__products" id="product__card">
                                    <div class="featured__box">
                                        <div class="featured__new">NEW</div>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>">
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" class=""><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>">
                                            <img src="<?php echo $featured_row['p_img']; ?>" alt="" class="featured__img avoid__clicks" 
                                            style="
                                                object-fit: cover;
                                                width:  232px;
                                                height: 232px;" 
                                            />
                                        </a>
                                    </div>

                                    <div class="featured__data">
                                        <?php $product_id = $featured_row['p_id']; ?>
                                        <!-- <form action="product.php?product_id=<?php echo $product_id; ?>"  method="POST">  -->
                                            <!-- set session to product id value  -->
                                            <!-- <input type="submit" name="view-product"  value="View Product" class="btn btn-primary btn-lg my-4 button" />
                                        </form> -->
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" style="text-decoration: none;">
                                        <h4 class="product__name" id="product__name"><?php echo $featured_row['p_name']; ?></h4>
                                        </a>
                                        
                                        <span class="featured__price">Rs <?php echo $featured_row['p_price']; ?></span>
                                        <?php 
                                          
                                        ?> 
                                       
                                    </div>
                                </div>

                            <?php
                        }
                    }

                ?>

            </div>

            
           
            

        </section>

       
        <!--========== OFFER 2 ==========-->

        <section class="offer section">
            <div class="offer__bg">
                <div class="offer__data">
                    <h2 class="offer__title">Special Offer</h2>
                    <p class="offer__description">Extreme Christmas Sales this month only!</p>

                    <a href="#" class="button button__round">SHOP NOW</a>
                </div>
            </div>
        </section>


        <!--========== CATEGORIES BUTTON ==========-->
        <?php 
        
        $result_cat = mysqli_query($conn, $Q_fetch_categories);

        ?>
        <div class="row category-title" style="margin-top: 1rem;">
                <div class="col">
                    <h2 class="category">new</h2>
                    <h2 class="category-name ">products</h2>
                </div>
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <?php
                        while($row_categories = mysqli_fetch_assoc($result_cat)){
                            $p_cat_id = $row_categories['p_cat_id'];
                            ?>
                            <a href="products_category.php?p_cat_id=<?php echo $p_cat_id; ?>"><?php echo $row_categories['p_cat_name']; ?></a>
                            <?php
                        }
                        
                        ?>
                    </div>
                </div>
            </div>


        <!--========== ATTEMPT TO QUERY NEW PRODUCTS ==========-->
        <section class="new section" id="new">
            <!-- <h2 class="section-title">FRESHLY OUT OF THE OVEN - PHP method</h2>
            <a href="#" class="section-all">View All</a> -->

            <div class="new__container bd-grid">
                <?php
                     
                     $result = mysqli_query($conn, $Q_fetch_new);
                     $check = mysqli_num_rows($result);

                     if($check>0){
                        while($new_row = mysqli_fetch_assoc($result)){
                            ?>

                                <div class="new__box">
                                    <img src="<?php echo $new_row['p_img'];?>" class="new__img" />

                                    <div class="new__link">
                                        <a href="product.php?product_id=<?php echo $new_row['p_id']; ?>" class="button"> VIEW PRODUCT</a>
                                    </div>
                                </div>

                            <?php
                        }
                     }

                ?>
                
            </div>
        </section>
        <!--========== NEWSLETTER ==========-->
        <section class="newsletter section" id="subscribed">
            <div class="newsletter__container bd-grid">
                <div class="newsletter__subscribe">
                    <h2 class="section-title">OUR NEWSLETTER</h2>
                    <p class="newsletter__description">Be the first to get informed about our best deals!</p>

                    <form action="" class="newsletter__form">
                        <input type="email" class="newsletter__input" placeholder="Enter your email" />
                        <a href="#" class="button">SUBSCRIBE</a>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <!--___________________________________________________________________________-->
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

    <!--___________________________________________________________________________-->


    <!--========== JAVASCRIPT ==========-->
    <!-- <script src="Javascript\main.js?<?php //echo filemtime('Javascript\main.js'); ?>" ></script> -->

   
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->





</body>
</html>