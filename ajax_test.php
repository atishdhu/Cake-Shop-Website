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
    <link rel="stylesheet" type="text/css" href="Sanjana.css">

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

        
        
        <section class="featured section" id="featured">

            <!--========== TITLE BANNER ==========-->
            <?php 
                //FETCH PRODUCT BY CATEGORY
                $result_cat = mysqli_query($conn, $Q_fetch_categories);

            ?>
            <div class="row category-title">
                <div class="col">
                    <h2 class="category" id="small_title"></h2>
                    <h2 class="category-name " id="big_title"></h2>
                </div>

                <!--========== SORT BY BUTTON ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Sort by &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <a href="#" onclick="sortby_products(1)">price low to high</a>
                        <a href="#" onclick="sortby_products(2)">price high to low</a>
                         
                    </div>
                </div>

                <!--========== CATEGORIES BUTTON ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <?php
                        while($row_categories = mysqli_fetch_assoc($result_cat)){
                            $categoryID = $row_categories['categoryID'];
                            $p_cat_name = $row_categories['p_cat_name'];
                            ?>
                            <a href="#" onclick="display_products_by_cat_id(<?php echo $categoryID; ?>, '<?php echo $p_cat_name; ?>'); " ><?php echo $p_cat_name; ?></a>
                            <!-- <input type="submit" onclick="display_products_by_cat_id(<?php echo $categoryID; ?>)" value="<?php echo $row_categories['p_cat_name']; ?>"> -->
                            
                            <?php 
                        }
                        
                        ?>
                    </div>
                </div>
            </div>

            <div id="result" class="featured__container bd-grid mt-4">
                <!-- PRODUCTS BY CATEGORY  -->
                <!-- SORTED PRODUCTS  -->
                
            </div>

           


        </section>

            <!-- IMPLEMENTING AJAX WITH JAVASCRIPT -->
            <script>

                //CATEGORIES FUNCTION - DISPLAY WITHOUT LOAD
                function display_products_by_cat_id(cat_id, cat_name){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "category_search.php?cat_id="+cat_id, true);
                    xhttp.send();   
                    console.log('sent');

                    //CHANGES TITLE
                    document.getElementById('small_title').innerHTML = 'CATEGORY';
                    document.getElementById('big_title').innerHTML = cat_name;
                    
                }

                //SORT BY FUNCTION - DISPLAY WITHOUT LOAD
                function sortby_products(sort_num){
                    var xhttp;
                      //AJAX
                      console.log('entered ajax sortby');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready sortby');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "sortby_search.php?sortby="+sort_num, true);
                    xhttp.send();   
                    console.log('sent sortby');

                    //CHANGES TITLE
                    document.getElementById('small_title').innerHTML = 'SORT BY PRICE';

                    if(sort_num == 1){
                        document.getElementById('big_title').innerHTML = 'low to high';
                    }
                    else if(sort_num ==2){
                        document.getElementById('big_title').innerHTML = 'high to low';
                    }
                    
                }


                //TYPE OF PRODUCTS FUNCTION - DISPLAY WITHOUT LOAD WHERE ID = RESULT
                function display_products_by_type(p_type){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "products_by_type_search.php?p_type="+p_type, true);
                    xhttp.send();   
                    console.log('sent');

                    //CHANGES TITLE

                    if(p_type==1){
                        document.getElementById('small_title').innerHTML = 'new';
                    }
                    else  if(p_type==2){
                        document.getElementById('small_title').innerHTML = 'featured';
                    }
                    else  if(p_type==3){
                        document.getElementById('small_title').innerHTML = 'sales';
                    }
                    else  if(p_type==4){
                        document.getElementById('small_title').innerHTML = 'best-seller';
                    }

                    //BIG TITLE
                    document.getElementById('big_title').innerHTML = 'PRODUCTS';
                    
                }

                
                //TYPE OF PRODUCTS FUNCTION - DISPLAY WITHOUT LOAD WHERE ID = RESULT
                function display_products_by_type_second(p_type){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result2").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "products_by_type_search.php?p_type="+p_type, true);
                    xhttp.send();   
                    console.log('sent');

                    //CHANGES TITLE

                    if(p_type==1){
                        document.getElementById('small_title').innerHTML = 'new';
                    }
                    else  if(p_type==2){
                        document.getElementById('small_title').innerHTML = 'featured';
                    }
                    else  if(p_type==3){
                        document.getElementById('small_title').innerHTML = 'sales';
                    }
                    else  if(p_type==4){
                        document.getElementById('small_title').innerHTML = 'best-seller';
                    }

                    //BIG TITLE
                    document.getElementById('big_title').innerHTML = 'PRODUCTS';
                    
                }

                //LAUNCHING FEATURED PRODUCTS FUNCTION
                display_products_by_type(2); // 2 --> featured
            </script>
        

    </body>

    