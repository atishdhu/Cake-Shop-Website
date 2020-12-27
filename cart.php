<?php 
    define('Access', TRUE);

    //SESSION START
    include "./AdditionalPHP/startSession.php";

    //DATABASE CONNECTION  cakeshop
    include_once 'connection.php';
?>

<?php
//Remove button
//The remove button loads the same page but carries some additional info in url
//cart.php?action=delete&product_id=<?php echo ...
//checks if url contains action=delete
if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loops through all products in shopping cart session array until id matches url
    foreach($_SESSION['shopping_cart'] as $key => $product){

        //checks if product_id in url (when remove button clicked) matches the one
        //in the shopping cart session array
        if($product['id'] == filter_input(INPUT_GET, 'product_id')){
            //remove product from shopping cart session array
            unset($_SESSION['shopping_cart'][$key]);
        }//end if
    }//end foreach

    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);

    //DELETE ROW FROM CARTITEM TABLE
    $Q_delete_cartitem = 'DELETE FROM cartitem WHERE productID = '.filter_input(INPUT_GET, 'product_id');
    $run_delete_cartitem = mysqli_query($conn, $Q_delete_cartitem);

}//end if
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>MALAKO | Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    <?php 
        
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FILES ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="Sanjana.css">

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
            
            $Q_fetch_featured = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //selects featured products
            $Q_fetch_new = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 1"; //selects new products
            $Q_fetch_product_details = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //selects product with id =1
            $Q_fetch__all_products = "SELECT * FROM products";
        
        ?>


        <!--========== HEADER ==========-->
        <?php $page = 'cart'?>
        
        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->
          

        <!--========== CART STRUCTURE ==========-->
        <div class="row mx-auto">
            <!-- Cart items -->
            <div class="col-lg">

                <!-- title -->
                <div class="row-md  title-cart">
                    <!-- <h1>M Y &nbsp C A R T</h1> -->
                    <h1 text-center>MY CART &nbsp</h1>
                    <i class='bx bxs-cart-download bx-tada-hover'></i>
                </div>
                <!-- header of order details -->
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
                <!-- Loop through session shopping cart -->
                <?php
                //if shopping cart not empty
                if(!empty($_SESSION['shopping_cart'])){
                    //create total variable 
                    $total = 0;
                    $_SESSION['total_quantity'] = 0;
                    //loop through each item in shopping cart
                    foreach($_SESSION['shopping_cart'] as $key => $product){ 
                
                ?>

                <!-- Receipt item card -->
                <div class="receipt-card mt-2 mb-3 mx-1 py-3">

                    <!-- product image -->
                    <?php
                    
                    $result_product = mysqli_query($conn, $Q_fetch__all_products);
                    $check = mysqli_num_rows($result_product);

                    if($check>0){ //checks if $result empty in database
                          //loops through all items in products table in database
                        while($product_row = mysqli_fetch_assoc($result_product)){

                              //compare if id in database in current loop is equal to  
                              //id in current session shopping cart foreach loop
                            if($product_row['productID'] == $product['id']){
                                ?>
                                <!-- prints image from database of corresponding id -->
                                <div class="cart_img">
                                    <img src="<?php  echo $product_row['p_img']; ?>" class="img-fluid">
                                </div>

                                <?php
                            }//end if
                        }//end while
                    }//end if check
                    ?>

                    <!-- <div class="cart_img">
                        <img src="Assets\images\products\Cake_2.jpg" class="img-fluid">
                    </div> -->

                    <!-- product details -->
                    <div class="">
                        <!-- product name -->
                        <div class="product-name">
                            <div class="product-name-det">
                                <h6><?php echo $product['name'];?></h6>
                                <h6>Rs <?php echo number_format($product['price'], 2);?> / unit</h6>
                            </div>
                        </div>
                    </div>

                        <!-- quantity -->
                        <div class="quantity-value">
                             <h6><?php echo $product['quantity'];?></h6>
                        </div>


                    <!-- product total price -->
                    <div class="tot-price-per-item ">
                        <h6>Rs <?php echo number_format($product['quantity'] * $product['price'], 2); ?></h6>
                    </div>

                      <!-- Remove -->
                    <div class="remove-button">
                        <!-- product['id'] is fetching id from session shopping cart array -->
                        <a href="cart.php?action=delete&product_id=<?php echo $product['id'];?>"> 
                        <button type="button" class="btn btn-primary btn-lg my-4 button rem-but"><i class='bx bx-x rem-but-x' style='color:#ffffff; font-size: 1.3rem ;'></i></button>
                        </a>
                    </div>
                </div>

                <?php

                    //CALCULATING TOTAL PRICE
                    $total = $total + ($product['quantity'] * $product['price']);

                    //CREATE SESSION FOR TOTAL PRICE
                    $_SESSION['total_price'] = $total;

                }//end foreach
                ?>
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
                            <h4 class="subtitle title-checkout">SUBTOTAL: </h4>
                        </div>
                        
                        <div class="col">
                            <h4 class="subtitle">Rs <?php echo number_format($total, 2); ?></h4>
                        </div>
                    </div>
                    <!-- delivery -->
                    <div class="row container delivery-area my-1">
                        <div class="col">
                            <h4 class="subtitle title-checkout">DELIVERY: </h4>
                        </div>
                        
                        <div class="col">
                            <h4 class="subtitle">Rs 0.00</h4>
                        </div>
                    </div>
                    <!-- total -->
                    <div class="row container total-area my-1 pt-2">
                        <div class="col">
                            <h4 class="subtitle title-checkout">TOTAL: </h4>
                        </div>
                        
                        <div class="col">
                           <h4 class="subtitle">Rs <?php echo number_format($total, 2); ?></h4>
                        </div>
                    </div>
                    
                    
                    <!-- checkout -->
                    <!-- show checkout if shopping cart array not empty -->
                    <?php
                    //check if shopping cart not empty
                    if(isset($_SESSION['shopping_cart']));{
                        //check if shopping cart contains more than 0 products
                        if(count($_SESSION['shopping_cart'])>0){
                    
                    ?>
                    <div class="row checkout-area">
                        <a href="checkout.php">
                            <button type="button" class="btn btn-primary btn-lg my-4 button">Checkout</button>
                        </a>
                    </div>
                    <?php
                     }//end count if
                     if(count($_SESSION['shopping_cart']) == 0) {
                        echo('<h1 class="subtitle">Your cart is empty!</h1>');
                     }
                    }//end isset if
                    if(!isset($_SESSION['shopping_cart'])) {
                        echo('<h1 class="subtitle">Your cart is empty!</h1>');
                     }
                    
                    ?>
                </div>
            </div>
            <?php  
                }//end if at start
                //Displays msg if cart is emty
                if(isset($_SESSION['shopping_cart'])) {
                    if(count($_SESSION['shopping_cart']) == 0) {
                        
                        echo('<h1 class="text-center my-3">Your cart is empty!</h1>');
                        echo('<div class="text-center py-3"><img src="Assets\images\cart\sad.png" class="img-fluid" style="max-width:17%;"></div>');
                        echo('<div class="text-center py-3"><a href="products.php" class="button button__round">SHOP NOW</a></div>');
                     }//end if session shopping cart == 0
                 }//end if isset
                 else { //if shopping cart is not set
                    echo('<h1 class="text-center my-3">Your cart is empty!</h1>');
                    echo('<div class="text-center py-3"><img src="Assets\images\cart\sad.png" class="img-fluid" style="max-width:17%;"></div>');
                    echo('<div class="text-center py-3"><a href="products.php" class="button button__round">SHOP NOW</a></div>');
                 }
                
            ?>
        </div>

           
        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Bottom Nav -->

        <!-- <script src="Javascript\main.js?<?php //echo filemtime('Javascript\main.js'); ?>" ></script> -->
    </body>
</html>