<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";




    // <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';




        // <!--========== PHP FETCH PRODUCT DETAILS ==========-->

        
        
        $p_type= $_REQUEST['p_type'];
        // $Q_fetch_by_type = "SELECT * FROM products WHERE typeID = $p_type; ";//selects products by type
        $Q_fetch_by_type= "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = '$p_type' "; //selects products by type


        // $Q_fetch_new =  "SELECT * FROM products WHERE typeID = 1 ; ";//selects new products
        $Q_fetch_new = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 1"; //selects new products



        
        $result = mysqli_query($conn, $Q_fetch_by_type);
        $check = mysqli_num_rows($result);

   
        if($check>0 && $p_type!=1){ 
           
           while($row = mysqli_fetch_assoc($result)){
               $product_id = $row['productID'];

               
               

            echo' <div class="featured__products" id="product__card">
                       <div class="featured__box">
                           <div class="featured__new">NEW</div>
                           <a href="product.php?product_id='.$product_id.'">
                           <a href="product.php?product_id='.$product_id.'" class=""><i class="bx bxs-cart-add bx-tada-hover featured__new_cart"></i></a>
                           <a href="product.php?product_id='.$product_id.'">
                               <img src=" '.$row['p_img'].' "  class="featured__img avoid__clicks" 
                               style="
                                   object-fit: cover;
                                   width:  232px;
                                   height: 232px;" 
                               />
                           </a>
                       </div>';

                       echo ' <div class="featured__data"> ';
                           $product_id = $row['productID'];
                          
                        echo'<a href="product.php?product_id='.$product_id.'" style="text-decoration: none;">
                           <h4 class="product__name" id="product__name">'.$row['p_name'].'</h4>
                           </a> ';
                           
                        echo '<span class="featured__price">Rs '.$row['p_price'].'</span>
                           
                       </div>
                   </div> ';

               
           }
        }

        //FOR NEW PRODUCTS ONLY
        else if($p_type ==1){
            $result_new = mysqli_query($conn, $Q_fetch_new);
            $check = mysqli_num_rows($result_new);

            if($check>0){
                while($new_row = mysqli_fetch_assoc($result_new)){
            echo '  <div class="new__box">
                        <img src=" '.$new_row['p_img'] .' " class="new__img" />

                        <div class="new__link">
                            <a href="product.php?product_id='.$new_row['productID'] .'" class="button"> VIEW PRODUCT</a>
                        </div>
                    </div> ';
                }
            }
           
        }

   


?>

        
