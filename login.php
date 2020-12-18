<?php
    session_start();

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

    $uname = $password= "";
    $errCriteria = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ((empty($_POST['uname'])) || (empty($_POST['password']))){
            $errCriteria = "Incorrect Username or Password!";
        } else {
            $uname = test_input($_POST['uname']);
            $password = test_input($_POST['password']);

            // select row
            $sql = "SELECT * FROM users WHERE uname='$uname'";
            $result= mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);

                // check if user has verified his email
                if($row['verified'] == 1)
                {
                    // check if hashed passwords match
                    if(password_verify($password, $row['pass']))
                    {
                        // store the users first name
                        $_SESSION['fname'] = $row['fname'];
                        header('location: userAccount.php');
                    } else {
                        $errCriteria = "Incorrect Username or Password!";
                    }
                }
                else
                {
                    $errCriteria = "Please verify you email address before you log in.";
                }
            } else {
                $errCriteria = "Incorrect Username or Password!";
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
        <title>MALAKO | LOGIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="Account.css">
        <title>MALAKO | Login</title>
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
            <div class="bg-image"></div>
        </div>
        <!--End Background Image-->

        
        <!--Start Login Panel-->
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>LOGIN</h3>
                        <p>Please enter your credentials to login.</p>
                    </div>
                </div>

                <form class="login-form" method="post" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="text" name="uname" placeholder="Username" value="<?php echo $uname;?>"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <span class="Password-Error"><?php echo $errCriteria;?></span>
                    <br><br>
                    <button>login</button>
                    <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
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