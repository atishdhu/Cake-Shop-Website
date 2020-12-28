<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>MALAKO | Checkout</title>

    

    <!-- BOOTSTRAP CORE CSS -->
<!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
  <link href="form-validation.css" rel="stylesheet">

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
            <span class="badge cart-number bg-pink rounded-pill">3</span>
          </h4>

          <!-- CART ITEMS LIST + TOTAL -->
          <ul class="list-group mb-3">

                <!-- PRODUCT 1  -->
            <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
              <div >
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted price-tag">Rs 120</span>
            </li>

                <!-- PRODUCT 2 -->
            <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted price-tag">Rs 80</span>
            </li>

                <!-- PRODUCT 3 -->
            <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted price-tag">Rs 50</span>
            </li>
          

                <!-- TOTAL -->
            <li class="list-group-item d-flex justify-content-between total-row">
              <span>Total (Rs)</span>
              <strong class="price-tag">Rs 250</strong>
            </li>
          </ul>

        </div>

        <!-- ================================================================================= -->

        <!-- BILLING ADDRESS  -->
        <div class="col-md-7 col-lg-8">

          <h4 class="mb-3 border-bottom-pink">Billing address</h4>
         
         
         
          <form class="needs-validation" novalidate>
            <div class="row g-3">


              <!-- ENTER FIRST NAME  -->
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>


              <!-- ENTER LAST NAME -->
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>


              <!-- ENTER USERNAME  -->
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text bg-pink">@</span>
                  <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>


              <!-- ENTER EMAIL  -->
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>


              <!-- ENTER ADDRESS -->
              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>


              <!-- CHOOSE COUNTRY  -->
              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="country" required>
                  <option value="">Choose...</option>
                  <option>Mauritius</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>


              <!-- CHOOSE CITY  -->
              <div class="col-md-4">
                <label for="state" class="form-label">City</label>
                <select class="form-select" id="state" required>
                  <option value="">Choose...</option>
                  <option>Port Louis</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>


              <!-- ENTER ZIP CODE -->
              <div class="col-md-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <hr class="my-4 pinkLine">


            <!-- ADDRESS CHECKBOX -->
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="same-address">
              <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>


            <hr class="my-4 pinkLine">


            <!-- PAYMENT METHOD -->
            <h4 class="mb-3">Payment Method</h4>


            <!-- CREDIT CARD  -->
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Credit card</label>
              </div>

              <!-- MCB JUICE  -->
              <div class="form-check">
                <input id="mcbjuice" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="mcbjuice">Juice by MCB</label>
              </div>

              <!-- PAYPAL  -->
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
            </div>

            <!-- CREDIT CARD DETAILS  -->
            <div class="row gy-3">

              <!-- NAME ON CARD  -->
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>


              <!-- CREDIT CARD NUMBER  -->
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>


              <!-- EXPIRATION  -->
              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>


              <!-- CVV SECURITY CODE  -->
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>


            <!-- COTINUE TO CHECKOUT BUTTON  -->
            <hr class="my-4 pinkLine" >

            <button class="w-100 btn btn-primary btn-lg button" type="submit">Continue to checkout</button>
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


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
