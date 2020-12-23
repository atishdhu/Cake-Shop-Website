<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

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
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel='stylesheet' type='text/css' href='Sanjana.css' />

    <!--========== BOOTSTRAP ==========-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
 
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
    <?php $page = 'products'?>
    <!--Start Navigation Bar-->
    <?php include './Includes/MobileNavBar.php';?>
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

        <!--Start Newsletter-->
        <?php include './Includes/NewsLetter.php';?>
        <!--End Newsletter-->


        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
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