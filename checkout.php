<?php 
    define('Access', TRUE);

    //SESSION START
    include "./AdditionalPHP/startSession.php";

    //DATABASE CONNECTION  cakeshop
    include_once 'connection.php';

    $validated = false;

    // define variables and set to empty values
    $fname = $lname = $email = $address = $country = $city = $zip = $paymentMethod = $ccname = $ccnum = $ccexp_m =$ccexp_y = $cccvv = "";
    $fnameErr = $lnameErr = $emailErr = $addressErr = $countryErr = $cityErr = $zipErr = $paymentMethodErr = $ccnameErr = $ccnumErr = $ccexpErr = $cccvvErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //FIRST NAME VALIDATION
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
          $fnameErr = "Only letters and white space allowed";
        }

        //LAST NAME VALIDATION
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
          $lnameErr = "Only letters and white space allowed";
        }
      
        //EMAIL VALIDATION
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
        
        //ADDRESS VALIDATION
        $address = test_input($_POST["address_checkout"]);
        // check if email contains numbers at the start, followed by letters, contains space, hyphen and comma
        if (!preg_match("/^[0-9a-zA-Z\s,-]+$/",$address)) {
          $addressErr = "Invalid address";
        }

        //COUNTRY VALIDATION
        // $country = test_input($_POST["country"]);
        // check if country == mauritius
        // if ($country != "Mauritius" || $country != "mauritius" ) {
        //   $addressErr = "Sorry, we currently deliver in Mauritius only.";
        // }

        //CITY VALIDATION
        $city = test_input($_POST["city"]);
        // check if city == options
        if ($city == "Port Louis" || $city == "Curepipe" || $city == "Vacoas" || $city == "Quatre Bornes" || $city == "Rose Hill" || $city == "Flic En Flac" || $city == "Phoenix") {
          //valid
        }
        else{
          $cityErr = "Invalid city";
        }

        //ZIP VALIDATION
        $zip = test_input($_POST["zip"]);
        // check if zip contains exactly 5 numbers
        if (!preg_match("/^[0-9]{5}/",$zip)) {
          $zipErr = "Invalid zip code";
        }
      
        //PAYMENT METHOD VALIDATION
        $paymentMethod = test_input($_POST["paymentMethod"]);

        //REGEX BY CARD TYPE
        $cardtype = array(
          "visa"       => "/^4[0-9]{15}$/",
          // "mastercard" => "/^5[1-5][0-9]{14}$/"
         
        );


        //CC NAME VALIDATION
        $ccname = test_input($_POST["ccname"]);
        // check if ccname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$ccname)) {
          $ccnameErr = "Only letters and white space allowed";
        }

        //CC NUM VALIDATION
        $ccnum = test_input($_POST["ccnum"]);
        // check if ccnum matches regex by supported card types
        if (!preg_match($cardtype['visa'],$ccnum)) {
          $ccnumErr = "Invalid card number
          <br>
          We are sorry! Our system currently supports VISA cards only.";
        }


        //CC EXPIRATION DATE VALIDATION
        if (empty($_POST["ccexp_m"]) || empty($_POST["ccexp_y"])) {
          $ccexpErr = "Please enter the expiration date";
        } 
        else {
            $ccexp_m = test_input($_POST["ccexp_m"]);
            $ccexp_y = test_input($_POST["ccexp_y"]);

            //VALIDATES MONTH
            if((int)$ccexp_m > 0 && (int)$ccexp_m < 13){
              //VALIDATES YEAR
              if((int)$ccexp_y > 1900 && (int)$ccexp_y < 4000){
                $expired_check = \DateTime::createFromFormat('my', $ccexp_m.$ccexp_y);
                $month_now = date('m');
                $year_now = date('y');
                $now = new \DateTime();
                //CHECK IF EXPIRED

                if($year_now < (int)$ccexp_y){
                  //valid year
                  
                }
                else if($year_now == (int)$ccexp_y){
                  if($month_now < (int)$ccexp_m){
                    //valid exp num
                  }
                  //exp
                  else{
                    $ccexpErr = "Your credit card has expired.";
                  }
                }
                //exp
                else {
                  $ccexpErr = "Your credit card has expired..";
                }




                // if ($expired_check > $now) {
                //   $ccexpErr = "Your credit card has expired";
                // }
              }
              else {
                $ccexpErr = "Invalid year";
              }
            }
            else {
              $ccexpErr = "Invalid expiration date";
            }
         }


          //CC CVV VALIDATION
          $cccvv = test_input($_POST["cccvv"]);
          // check if CVV contains has 3 or 4 digits and is
          //between 0-9 and does not have any alphabets and special characters.
          if (preg_match("/^[0-9]{3,4}$/",$cccvv)) {
            //valid
          }
          else{
            $cccvvErr = "Invalid CVV";
          }

          if($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $addressErr == "" && $countryErr == "" && $cityErr == "" && $zipErr == "" && $paymentMethodErr == "" && $ccnameErr == "" && $ccnumErr == "" && $ccexpErr == "" && $cccvvErr == ""){
            $validated = true;
          }
  
      
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
      

    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>MALAKO | Checkout</title>

    

    <!-- BOOTSTRAP CORE CSS -->

    <link href="checkout/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="checkout/form-validation.css" rel="stylesheet">

  </head>


<body>
      
  <div class="container">
    
    <main>

      <!-- TITLE -->
      <div class="py-5 text-center">
        <h1 class="business-name">MALAKO</h1>
        <h2>Checkout form</h2>
      </div>


        <!-- MY CART  -->
      <div class="row g-3">
        <div class="col-md-5 col-lg-4 order-md-last">

          <!-- YOUR CART / CART VALUE -->
          <h4 class="d-flex justify-content-between align-items-center my-cart mb-3">
            <span class="text-muted">Your cart</span>
            <!-- //CART NUMBER -->
            <span class="badge cart-number bg-pink rounded-pill"><?php if(isset($_SESSION['item_quantity'])) {echo $_SESSION['item_quantity'];} else {echo "0";} ?></span>
          </h4>

          <!-- CART ITEMS LIST + TOTAL -->
          <ul class="list-group mb-3">
            <?php
            foreach($_SESSION['shopping_cart'] as $key => $product){
              $Q_fetch__all_products = "SELECT * FROM products";
              $result_product = mysqli_query($conn, $Q_fetch__all_products);

              while($product_row = mysqli_fetch_assoc($result_product)){
                if($product_row['productID'] == $product['id']){
                  ?>

              
              
                  <!-- PRODUCT 1  -->
              <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
                <div >
                  <h6 class="my-0"><?php echo $product_row['p_name']; ?></h6>
                  <small class="text-muted">x <?php echo $product['quantity']; ?> unit(s)</small>
                </div>
                <span class="text-muted price-tag">Rs <?php echo number_format(($product['quantity']  * $product_row['p_price']),2); ?></span>
              </li>
            
            <?php
                }
              }
            
          }//end foreach
            
            ?>

                <!-- TOTAL -->
            <li class="list-group-item d-flex justify-content-between total-row">
              <span>Total (Rs)</span>
              <strong class="price-tag">Rs <?php echo number_format($_SESSION['total_price'], 2); ?></strong>
            </li>
          </ul>

        </div>

        <!-- ================================================================================= -->

        <!-- BILLING ADDRESS  -->
        <div class="col-md-7 col-lg-8">

          <h4 class="mb-3 border-bottom-pink">Billing address</h4>
         
         
         
        <form action=
            "
            <?php
              if($validated){
                echo 'ThankYouCheckout.php';
                $validated = false;
              }
              else {
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
              }
            
            ?>"
          class="needs-validation" method="POST">
          <div class="row g-3">


              <!-- ENTER FIRST NAME  -->
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" name="fname" id="firstName" placeholder="" value="<?php echo $fname; ?>" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
                <span class="error"><?php echo $fnameErr;?></span>
              </div>


              <!-- ENTER LAST NAME -->
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lname" id="lastName" placeholder="" value="<?php echo $lname; ?>" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
                <span class="error"><?php echo $lnameErr;?></span>
              </div>


              <!-- ENTER EMAIL  -->
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="<?php echo $email; ?>">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
                <span class="error"><?php echo $emailErr;?></span>
              </div>


              <!-- ENTER ADDRESS -->
              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address_checkout" placeholder="1234 Main St" value="<?php echo $address; ?>" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
                <span class="error"><?php echo $addressErr;?></span>
              </div>


              <!-- CHOOSE COUNTRY  -->
              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" name="country" id="country" required>
                  <option value="Mauritius">Mauritius</option>
                </select>
                <!-- <div class="invalid-feedback">
                  Please select a valid country.
                </div>
                <span class="error"><?php //echo $countryErr;?></span> -->
              </div>


              <!-- CHOOSE CITY  -->
              <div class="col-md-4">
                <label for="state" class="form-label">City</label>
                <select class="form-select" name="city" id="state" required>
                  <option value="Port Louis">Port Louis</option>
                  <option value="Curepipe">Curepipe</option>
                  <option value="Quatre Bornes">Quatre Bornes</option>
                  <option value="Vacoas">Vacoas</option>
                  <option value="Rose Hill">Rose Hill</option>
                  <option value="Flic En Flac">Flic En Flac</option>
                  <option value="Phoenix">Phoenix</option>

                </select>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
                <span class="error"><?php echo $cityErr;?></span>
              </div>


              <!-- ENTER ZIP CODE -->
              <div class="col-md-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" name="zip" value="<?php echo $zip; ?>" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
                <span class="error"><?php echo $zipErr;?></span>
              </div>
            </div>

            <hr class="my-4 pinkLine">


            <!-- ADDRESS CHECKBOX -->
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="address_check" id="same-address">
              <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>


            <hr class="my-4 pinkLine">


            <!-- PAYMENT METHOD -->
            <h4 class="mb-3">Payment Method</h4>


            <!-- CREDIT CARD  -->
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value="creditCard" <?php if ($paymentMethod == "creditCard"){ echo "checked";} ?> >
                <label class="form-check-label" for="credit">Credit card</label>
              </div>

              <!-- MCB JUICE  -->
              <div class="form-check">
                <input id="mcbjuice" name="paymentMethod" type="radio" class="form-check-input" value="JuiceByMCB" <?php if ($paymentMethod == "JuiceByMCB"){ echo "checked";} ?> >
                <label class="form-check-label" for="mcbjuice">Juice by MCB</label>
              </div>

              <!-- PAYPAL  -->
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" value="paypal" <?php if ($paymentMethod == "paypal"){ echo "checked";} ?> >
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>

              <span class="error"><?php echo $paymentMethodErr;?></span>
            </div>

            

            <!-- CREDIT CARD DETAILS  -->
            <div class="row gy-3">

              <!-- NAME ON CARD  -->
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" name="ccname" id="cc-name" placeholder="" value="<?php echo $ccname; ?>" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
                <span class="error"><?php echo $ccnameErr;?></span>
              </div>


              <!-- CREDIT CARD NUMBER  -->
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" name="ccnum" id="cc-number" placeholder="" value="<?php echo $ccnum; ?>" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
                <span class="error"><?php echo $ccnumErr;?></span>
              </div>


              <!-- EXPIRATION  -->
              <div class="col-md-6">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <div class="" style="display: flex;">
                  <input type="text" class="form-control" name="ccexp_m" id="cc-expiration-mm" placeholder="mm" value="<?php echo $ccexp_m; ?>" required>
                  <input type="text" class="form-control" style="margin-left: 1rem;" name="ccexp_y" id="cc-expiration-yy" placeholder="yyyy" value="<?php echo $ccexp_y; ?>" required>
                </div>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
                <span class="error"><?php echo $ccexpErr;?></span>
              </div>


              <!-- CVV SECURITY CODE  -->
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" name="cccvv"id="cc-cvv" placeholder="" value="<?php echo $cccvv; ?>" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
                <span class="error"><?php echo $cccvvErr;?></span>
              </div>
            </div>


            <!-- COTINUE TO CHECKOUT BUTTON  -->
            <hr class="my-4 pinkLine" >
            
            <button class="w-100 btn btn-primary btn-lg button" type="submit">Continue to checkout</button>
            
            <a href="index.php" class="w-30 btn btn-primary btn-lg button mt-3 cancel">Cancel</a>

            <!-- <button class="w-30 btn btn-primary btn-lg button mt-3 cancel">Cancel</button> -->
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020 MALAKO</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>


      <script src="checkout/bootstrap.bundle.min.js"></script>
      <script src="checkout/form-validation.js"></script>

  </body>
</html>
