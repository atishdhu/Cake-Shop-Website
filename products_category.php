<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>MALAKO | Category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    <?php 
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FILES ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="Sanjana.css">

    <!--========== BOOTSTRAP ==========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Bootstrap Core CSS -->
    <!-- <link rel="stylesheet" href="./bootstrap/css/bootstrap.css"> -->

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
            
            $Q_fetch_featured = "SELECT * FROM products WHERE typeID = 2 ; ";//selects featured products
            $Q_fetch_new =  "SELECT * FROM products WHERE typeID = 1 ; ";//selects new products
            $Q_fetch_product_details =  "SELECT * FROM products WHERE productID = 1 ; ";//selects product with id =1
            $Q_fetch_categories = "SELECT * FROM product_categories;"; //selects all categories
            $Q_sortby_price_asc = "SELECT * FROM products ORDER BY p_price ASC; "; //sort all products by price low to high
            $Q_sortby_price_dsc = "SELECT * FROM products ORDER BY p_price DESC; "; //sort all products by price high to low
            
            
        
        ?>


        <!--========== HEADER ==========-->
        <?php $page = 'products_category'?>
        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->

      


        <!--========== PHP FETCH PRODUCT DETAILS ==========-->

        <?php
            if(isset($_GET['categoryID'])){
                $cat_id = $_GET['categoryID'];
                $Q_fetch_product_by_cat_id = "SELECT * FROM products WHERE categoryID = '$cat_id' ; ";
                $Q_fetch_cat_name_by_cat_id = "SELECT * FROM product_categories WHERE categoryID = '$cat_id' ; ";

                $run_cat = mysqli_query($conn, $Q_fetch_cat_name_by_cat_id );
                $row_cat = mysqli_fetch_array($run_cat);

            }
        ?>

        
        <section class="featured section" id="featured">

               <!--========== TITLE BANNER ==========-->
            <?php 
            
                $result_cat = mysqli_query($conn, $Q_fetch_categories);

            ?>
            <div class="row category-title">
                <div class="col">
                    <h2 class="category">CATEGORY</h2>
                    <h2 class="category-name "><?php echo $row_cat['p_cat_name']; ?></h2>
                </div>

                <!--========== SORT BY BUTTON ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Sort by &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <a href="products_sortby.php?sortby=1">price low to high</a>
                        <a href="products_sortby.php?sortby=2">price high to low</a>
                         
                    </div>
                </div>

                <!--========== CATEGORIES BUTTON ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <?php
                        while($row_categories = mysqli_fetch_assoc($result_cat)){
                            $categoryID = $row_categories['categoryID'];
                            ?>
                            <a href="products_category.php?categoryID=<?php echo $categoryID; ?>"><?php echo $row_categories['p_cat_name']; ?></a>
                            <?php
                        }
                        
                        ?>
                    </div>
                </div>
            </div>

             


            <div class="featured__container bd-grid mt-4">

                <?php
                         $run_get_product_by_cat_id = mysqli_query($conn, $Q_fetch_product_by_cat_id); 
                        while($row_product = mysqli_fetch_assoc($run_get_product_by_cat_id)){
                             $product_id = $row_product['productID'];
                            ?>

                                <div class="featured__products" id="product__card">
                                    <div class="featured__box">
                                        <div class="featured__new">NEW</div>
                                        <div class=""><a href="product.php?product_id=<?php echo $product_id; ?>"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" >
                                            <img src="<?php echo $row_product['p_img']; ?>" alt="" class="featured__img avoid__clicks"
                                            style="
                                                object-fit: cover;
                                                width:  232px;
                                                height: 232px;" />
                                        </a>
                                    </div>

                                    <div class="featured__data">
                                        <?php $product_id = $row_product['productID']; ?>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" class="product__name" id="product__name"style="text-decoration: none;"><?php echo $row_product['p_name']; ?></a></br>
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