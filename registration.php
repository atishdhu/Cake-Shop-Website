<?php
    $servername = "localhost";
    $serverUsername = "root";
    $serverPassword = "";
    $db_name = "demo";
    
    // Create connection
    $conn = new mysqli($servername, $serverUsername, $serverPassword, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $uname = $fname = $lname = $email = $password= "";
    $passwordCriteria = "";
    $fnameCriteria = "";
    $lnameCriteria = "";
    $unameCriteria = "";
    $emailCriteria = "";
    $confirmPasswordCriteria = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $unameOK = false;
        $fnameOK = false;
        $lnameOK = false;
        $emailOK = false;
        $passwordOK = false;

        if(empty($_POST["uname"])){
            $unameCriteria = "Username is required!";
        } else {
            $uname = test_input($_POST["uname"]);

            // check for english chars + numbers only
            // and alphanumeric & longer than or equals 5 chars
            if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $uname)) { 
                $unameCriteria = "Username must have only alphanumeric characters and must be minimum 5 characters long.";
            }
            else {
                // check if username already in database
                $sql = "SELECT * FROM users WHERE uname='$uname'";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) === 1){
                    $unameCriteria = "Username Already Exist!";
                }
                else
                {
                    $unameOK = true;
                }
            }
        }

        if (empty($_POST["fname"])) {
            $fnameCriteria = "First name is required";
        } else {
            $fname = test_input($_POST["fname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                $fnameCriteria = "Only letters and white space allowed";
            }
            else
            {
                $fnameOK = true;
            }
        }

        if (empty($_POST["lname"])) {
            $lnameCriteria = "Last name is required";
        } else {
            $lname = test_input($_POST["lname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                $lnameCriteria = "Only letters and white space allowed";
            }
            else
            {
                $lnameOK = true;
            }
        }

        if (empty($_POST["email"])) {
            $emailCriteria = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if name only contains letters and whitespace
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailCriteria = "Invalid email format";
            }
            else
            {
                // check if username already in database
                $sql = "SELECT * FROM users WHERE email='$email'";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) === 1){
                    $emailCriteria = "Email Already Exist!";
                }
                else
                {
                    $emailOK = true;
                }
            }
        }

        if (empty($_POST["password"])) {
            $passwordCriteria = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            // password must meet the following criterias:
            // has to contain at least one number
            // has to contain at least one capital letter
            // has to be a number, a letter or one of the following: !@#$%
            // there have to be between 8 to 20 characters
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $password)) {
                $passwordCriteria = 'Password must have at least <b>one number</b>, at least <b>one capital letter</b>, at least of the following <b>!@#$%</b> and must be between <b>8</b> to <b>20</b> characters long!';
            }
            else {
                $passwordOK = true;
            }

            if (empty($_POST["confirmPassword"])) {
                $confirmPasswordCriteria = "Please confirm your password.";
            }
            else if (($_POST["confirmPassword"]) == $password){
                if($unameOK == true && $passwordOK == true && $fnameOK == true && $lnameOK == true && $emailOK == true)
                {
                    //Generate VKey
                    $vkey = md5(time().$uname);

                    $passHash = password_hash($password, PASSWORD_BCRYPT);

                    $sql = "INSERT INTO users (uname, pass, fname, lname, email, vkey)
                    VALUES ('$uname', '$passHash', '$fname', '$lname', '$email', '$vkey')";

                    if(mysqli_query($conn, $sql)){
                        //send mail
                        $to = $email;
                        $subject = "Email Verification";
                        $message = "<a href='http://localhost/MyFiles/Cake%20Shop/verifyEmail.php?vkey=$vkey'>Register Account</a>";
                        $headers = "From: malako.cakeshop@gmail.com \r\n";
                        $headers .= "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        mail($to, $subject, $message, $headers);
                        header('location: login.php');
                    }
                }
            }
            else {
                $confirmPasswordCriteria = "Passwords do not match!";
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | JOIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <!--Start Navigation Bar-->
        <?php $page = 'login';?>
        <header class="main-header">
            <nav class="nav main-nav">

                <input type="checkbox" id="check">
                
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars animate__animated animate__backInDown"></i>
                </label>

                <h1 class="business-name"><a href="index.html" class="animate__animated animate__backInDown">Malako</a></h1>

                <ul>
                    <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>" href="index.php">HOME</a></li>
                    <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>" href="products.php">PRODUCTS</a></li>
                    <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>" href="makeyourcake.php">MAKE YOUR CAKE</a></li>
                    <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>" href="about.php">ABOUT</a></li>
                    <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>" href="contact.php">CONTACT US</a></li>
                </ul>
            </nav>
        </header>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <header class="main-header-media1200">
                <nav class="nav-media1200 main-nav-media1200">

                    <h1 class="business-name-media1200"><a href="index.php" class="animate__animated animate__backInDown">Malako</a></h1>

                    <ul class="animate__animated animate__backInDown">
                        <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>">HOME</a></li>
                        <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>">PRODUCTS</a></li>
                        <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>">MAKE YOUR CAKE</a></li>
                        <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>">ABOUT</a></li>
                        <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>">CONTACT US</a></li>
                        <li><a href="#" class="user-button"><i class="bx bx-cart nav__cart"></i></a></li>
                        <li><a href="login.php" class="<?php if($page == 'login'){echo 'active';}?> user-button"><i class="far fa-user-circle"></i></a></li>
                    </ul>
                </nav>
        </header>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Background Image-->
        <div class="bg-image-container">
            <div class="bg-image-join"></div>
        </div>
        <!--End Background Image-->


        <!--Start Login Panel-->
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>JOIN</h3>
                        <p>Please enter the required fields below to join.</p>
                    </div>
                </div>

                <form class="login-form" method="post" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span class="Uname-Error"><?php echo $unameCriteria;?></span>
                    <br>    
                    <input type="text" name="uname" placeholder="Username" value="<?php echo $uname;?>"/>
                    <span class="FirstName-Error"><?php echo $fnameCriteria;?></span>
                    <br>
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>"/>
                    <span class="LastName-Error"><?php echo $lnameCriteria;?></span>
                    <br>
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"/>
                    <span class="Email-Error"><?php echo $emailCriteria;?></span>
                    <br>
                    <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                    <span class="Password-Error"><?php echo $passwordCriteria;?></span>
                    <br>
                    <input type="password" name="password" placeholder="Password"/>
                    <span class="Password-Error"><?php echo $confirmPasswordCriteria;?></span>
                    <br>
                    <input type="password" name="confirmPassword" placeholder="Confirm Password"/>
                    <button>Join</button>
                    <p class="message">Already have an account? <a href="login.php">Sign In</a></p>
                    <!-- <p class="or-message"><b>OR</b></p> -->
                </form>

                <!-- <div class="social-login">
                    <span class="login-text">Login with: </span>
                    <span><a><i class="fab fa-facebook-f"></i></a></span>
                    <span><a><i class="fab fa-twitter"></i></a></span>
                    <span><a><i class="fab fa-google-plus-g"></i></a></span>
                </div> -->
            </div>
        </div>
        <!--End Login Panel-->
    </body>
</html>