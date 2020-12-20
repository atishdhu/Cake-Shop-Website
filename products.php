<!-- <?php
// Start the session
// session_start();
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
    ?>

    <!--========== CSS FILE ==========-->
    <link rel="stylesheet" type="text/css" href="Sanjana.css">
    <link rel='stylesheet' type='text/css' href='sanj2.css' />

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
                <a href="cart.php"><i class="bx bx-cart nav__cart animate__animated animate__backInDown"></i><p class="cart-number-mob">0</p></a>
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
        <nav class="nav-media1200 main-nav-media1200" >

            <h1 class="business-name-media1200"><a href="index.html" class="animate__animated animate__backInDown">Malako</a></h1>

            <ul class="animate__animated animate__backInDown">
                <li><a href="index.html">HOME</a></li>
            
                <li><a class="active" href="products.php">PRODUCTS</a></li>
                
                <li><a href="makeyourcake.html">MAKE YOUR CAKE</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT US</a></li>
                <li><a href="cart.php"><i class="bx bx-cart nav__cart"></i></a><p class="cart-number">0</p></li> <!--cart icon-->
                
            </ul>

           

            
        </nav>
    </header>

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
        <div class="row">
            <div class="dropdown col-auto mx-auto pt-5 pb-1">
                <button class="dropbtn button" id="cat-but" onclick="document.getElementById('cat-but').style.border='none'">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
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
            <h2 class="section-title">FEATURED PRODUCTS-PHP method</h2>
            <a href="#" class="section-all">View All</a>

            <div class="featured__container bd-grid">

                <?php 
                     $result = mysqli_query($conn, $Q_fetch_featured);
                     $check = mysqli_num_rows($result);
             
                
                    if($check>0){
                        
                        while($featured_row = mysqli_fetch_assoc($result)){
                            

                            
                            ?>

                                <div class="featured__products" id="product__card">
                                    <div class="featured__box">
                                        <div class="featured__new">NEW</div>
                                        <div class=""><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></div>
                                        
                                            <img src="<?php echo $featured_row['p_img']; ?>" alt="" class="featured__img avoid__clicks" />
                                    </div>

                                    <div class="featured__data">
                                        <?php $product_id = $featured_row['p_id']; ?>
                                        <form action="product.php?product_id=<?php echo $product_id; ?>"  method="POST"> 
                                            <!-- <input type="hidden" name="p_id_name" id="product_id_js"  value="<?php echo $product_id;?>" /> -->
                                            <!-- set session to product id value  -->
                                            <input type="submit" name="view-product"  value="View Product" class="btn btn-primary btn-lg my-4 button" />
                                            <!-- onclick='setSession(<?php //echo $product_id;?>); console.log("<?php //$_SESSION["p_id"] ?>");' -->
                                        </form>
                                        <h4 class="product__name" id="product__name"><?php echo $featured_row['p_name']; ?></h4></br>
                                        <span class="featured__price">Rs <span id="f_price"><?php echo $featured_row['p_price']; ?></span></span>
                                        <?php 
                                           // echo '<a href="#" class="featured__name">' .$featured_row['p_name'].'</a></br>
                                                 //<span class="featured__price"> Rs '.$featured_row['p_price'].'</span>';
                                        ?> 
                                       
                                    </div>
                                </div>

                            <?php
                        }
                    }
                //echo '<a href="#" class="product__name featured__name"><h3 class="featured__name">' .$featured_row['p_name'].'</h3></a>

                
                ?>

            </div>

            
           
            

        </section>

       
        
        <!--========== FEATURED PRODUCTS ==========-->
        <section class="featured section" id="featured">
            <h2 class="section-title">FEATURED PRODUCTS</h2>
            <a href="#" class="section-all">View All</a>

            <div class="featured__container bd-grid">
                <div class="featured__products">
                    <div class="featured__box">
                        <div class="featured__new">NEW</div>
                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                        <img src="Assets\images\products\cupcake_pic.png" alt="" class="featured__img" />
                    </div>

                    <div class="featured__data">
                        <h3 class="featured__name">Vanilla cupcake with whipped cream  </h3>
                        <span class="featured__price">Rs 25</span>
                    </div>
                </div>

                <div class="featured__products">
                    <div class="featured__box">
                        <div class="featured__new">NEW</div>
                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                        <img src="Assets\images\products\red_velvet_cupcake_pic.png" alt="" class="featured__img" />
                    </div>

                    <div class="featured__data">
                        <h3 class="featured__name">Red Velvet cupcake with creamcheese frosting  </h3>
                        <span class="featured__price">Rs 25</span>
                    </div>
                </div>

                <div class="featured__products">
                    <div class="featured__box">
                        <div class="featured__new">NEW</div>
                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                        <img src="Assets\images\products\cookies_pic.png" alt="" class="featured__img" />
                    </div>

                    <div class="featured__data">
                        <h3 class="featured__name">Chocolate chip cookies </h3>
                        <span class="featured__price">Rs 15 / piece</span>
                    </div>
                </div>


                <div class="featured__products">
                    <div class="featured__box">
                        <div class="featured__new">NEW</div>
                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                        <img src="Assets\images\products\croissants_pic.jpg" alt="" class="featured__img" />
                    </div>

                    <div class="featured__data">
                        <h3 class="featured__name">Freshly baked croissants </h3>
                        <span class="featured__price">Rs 20 / piece</span>
                    </div>
                </div>

                <div class="featured__products">
                    <div class="featured__box">
                        <div class="featured__new">NEW</div>
                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                        <img src="Assets\images\products\donut_on_plate_pic.jpg" alt="" class="featured__img" />
                    </div>

                    <div class="featured__data">
                        <h3 class="featured__name">Donut with sugar glaze </h3>
                        <span class="featured__price">Rs 60 / piece</span>
                    </div>
                </div>

                <div class="featured__products">
                    <div class="featured__box">
                        <div class="featured__new">NEW</div>
                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                        <img src="Assets\images\products\macaron_box_pic.jpg" alt="" class="featured__img" />
                    </div>

                    <div class="featured__data">
                        <h3 class="featured__name">Macaron box x 20 pieces with 6 flavours  </h3>
                        <span class="featured__price">Rs 650</span>
                    </div>
                </div>

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

        <!--========== ATTEMPT TO QUERY NEW PRODUCTS ==========-->
        <section class="new section" id="new">
            <h2 class="section-title">FRESHLY OUT OF THE OVEN - PHP method</h2>
            <a href="#" class="section-all">View All</a>

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

        <!--========== NEW ARRIVALS ==========-->
        <section class="new section" id="new">
            <h2 class="section-title">FRESHLY OUT OF THE OVEN</h2>
            <a href="#" class="section-all">View All</a>

            <div class="new__container bd-grid">
                <div class="new__box">
                    <img src="Assets\images\1.index\Cake_1.jpg" class="new__img" />

                    <div class="new__link">
                        <a href="#" class="button"> VIEW PRODUCT</a>
                    </div>
                </div>

                <div class="new__box">
                    <img src="Assets\images\1.index\Cake_2.jpg" class="new__img" />

                    <div class="new__link">
                        <a href="#" class="button"> VIEW PRODUCT</a>
                    </div>
                </div>

                <div class="new__box">
                    <img src="Assets\images\1.index\Cake_3.jpg" class="new__img" />

                    <div class="new__link">
                        <a href="#" class="button"> VIEW PRODUCT</a>
                    </div>
                </div>

                <div class="new__box">
                    <img src="Assets\images\1.index\Cake_4.jpg" class="new__img" />

                    <div class="new__link">
                        <a href="#" class="button"> VIEW PRODUCT</a>
                    </div>
                </div>
                <div class="new__box">
                    <img src="Assets\images\products\cupcake_bg.jpg" class="new__img" />

                    <div class="new__link">
                        <a href="#" class="button"> VIEW PRODUCT</a>
                    </div>
                </div>

                <div class="new__box">
                    <img src="Assets\images\1.index\Cake_5.jpg" class="new__img" />

                    <div class="new__link">
                        <a href="#" class="button"> VIEW PRODUCT</a>
                    </div>
                </div>
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
    <script src="Javascript\main.js?<?php echo filemtime('Javascript\main.js'); ?>" ></script>

     <!-- AJAX  --> 
    <script type='text/javascript'>
    //to setSession on click
        // function getXMLHTTPRequest() {
        // try {
        // req = new XMLHttpRequest();
        // } catch(err1) {
        // try {
        // req = new ActiveXObject("Msxml2.XMLHTTP");
        // } catch (err2) {
        //     try {
        //     req = new ActiveXObject("Microsoft.XMLHTTP");
        //     } catch (err3) {
        //     req = false;
        //     }
        // }
        // }
        // return req;
        // }



        // var http = getXMLHTTPRequest();
        // function setSession(value) {
        // var myurl = "session.php";  // to be present in the same folder
        // var myurl1 = myurl;
        // myRand = parseInt(Math.random()*999999999999999);
        // var modurl = myurl1+"?rand="+myRand+"url"+value ; // this will set the url to be sent

        // http.open("GET", modurl, true);
        // http.onreadystatechange = useHttpResponse;
        // http.send(null);
        // }


        // function useHttpResponse() {
        // if (http.readyState == 4) {
        //     if(http.status == 200) {
        //     var mytext = http.responseText;
        //     // I dont think u will like to do any thing with the response
        //     // u can redirect the user to the req page (link clicked), once the session url has been setted
        //         }
        //     }
        //     else {
        //         // don't do anything until any result is obtained
        //         }
        //     } 
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->





</body>
</html>