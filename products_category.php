<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>MALAKO | Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    <?php 
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FILES ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="sanj2.css">

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
            $Q_fetch_categories = "SELECT * FROM product_categories"; //selects all categories
            
        
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
                    <a href="cart.php"><i class="bx bx-cart nav__cart animate__animated animate__backInDown"></i>
                    <p class="cart-number-mob"><?php echo $_SESSION['item_quantity']; ?></p></a>
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
        <header class="main-header-media1200">
            <nav class="nav-media1200 main-nav-media1200 details-header" >

                <h1 class="business-name-media1200"><a href="index.html" class="animate__animated animate__backInDown">Malako</a></h1>
                <ul class="animate__animated animate__backInDown">
                <li><a href="index.php">HOME</a></li>
            
                <li><a class="active" href="products.php">PRODUCTS</a></li>
                
                <li><a href="makeyourcake.php">MAKE YOUR CAKE</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="cart.php"><i class="bx bx-cart nav__cart"></i></a>
                <p class="cart-number"><?php echo $_SESSION['item_quantity']; ?></p></li> <!--cart icon-->
                
            </ul>

                


                
            </nav>
        </header>

        <!--End Navigation Bar @media 1200px-->

          <!--========== CATEGORIES BUTTON ==========-->
        <?php 
        
        //$result_cat = mysqli_query($conn, $Q_fetch_categories);

        ?>
        <!-- <div class="row category-title">
            <h2 class="category">CATEGORY</h2>
            <h2 class="category-name "><?php echo $row_cat['p_cat_name']; ?></h2>
            <div class="dropdown col-auto mx-auto pt-5 pb-1">
                <button class="dropbtn button" id="cat-but" style="outline: none;">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
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
        </div> -->


        <!--========== PHP FETCH PRODUCT DETAILS ==========-->

        <?php
            if(isset($_GET['p_cat_id'])){
                $cat_id = $_GET['p_cat_id'];
                $Q_fetch_product_by_cat_id = "SELECT * FROM products WHERE p_cat_id = '$cat_id' ; ";
                $Q_fetch_cat_name_by_cat_id = "SELECT * FROM product_categories WHERE p_cat_id = '$cat_id' ; ";

                $run_cat = mysqli_query($conn, $Q_fetch_cat_name_by_cat_id );
                $row_cat = mysqli_fetch_array($run_cat);

            }
        ?>

        
        <section class="featured section" id="featured">

               <!--========== CATEGORIES BUTTON ==========-->
            <?php 
            
                $result_cat = mysqli_query($conn, $Q_fetch_categories);

            ?>
            <div class="row category-title">
                <div class="col">
                    <h2 class="category">CATEGORY</h2>
                    <h2 class="category-name "><?php echo $row_cat['p_cat_name']; ?></h2>
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

            <!-- <div class="category-title">
                <h2 class="category">CATEGORY</h2>
                <h2 class="category-name "><?php echo $row_cat['p_cat_name']; ?></h2>
            </div> -->

            <div class="featured__container bd-grid mt-4">

                <?php
                         $run_get_product_by_cat_id = mysqli_query($conn, $Q_fetch_product_by_cat_id); 
                        while($row_product = mysqli_fetch_assoc($run_get_product_by_cat_id)){

                            ?>

                                <div class="featured__products" id="product__card">
                                    <div class="featured__box">
                                        <div class="featured__new">NEW</div>
                                        <div class=""><a href="#"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                                        
                                            <img src="<?php echo $row_product['p_img']; ?>" alt="" class="featured__img avoid__clicks"
                                            style="
                                                object-fit: cover;
                                                width:  232px;
                                                height: 232px;" />
                                    </div>

                                    <div class="featured__data">
                                        <?php $product_id = $row_product['p_id']; ?>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" class="product__name" id="product__name"><?php echo $row_product['p_name']; ?></a></br>
                                        <span class="featured__price">Rs <?php echo $row_product['p_price']; ?></span>
                                       
                                    </div>
                                </div>

                            <?php
                        }
                
                ?>

            </div>

            
           
            

        </section>

       
        <!-- Javascript -->
        <!-- <script src="Javascript\main.js?<?php //echo filemtime('Javascript\main.js'); ?>" ></script> -->
    </body>
</html>