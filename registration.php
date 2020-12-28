<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<?php
    include "connection.php";

    $uname = $fname = $lname = $email = $password= "";
    $passwordCriteria = "";
    $fnameCriteria = "";
    $lnameCriteria = "";
    $unameCriteria = "";
    $emailCriteria = "";
    $confirmPasswordCriteria = "";
    $recaptchaCriteria = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $unameOK = false;
        $fnameOK = false;
        $lnameOK = false;
        $emailOK = false;
        $passwordOK = false;
        $confirmPasswordOK = false;

        if(empty($_POST["uname"])){
            $unameCriteria = "Username is required";
        } else {
            $uname = test_input($_POST["uname"]);

            // check for english chars + numbers only
            // and alphanumeric & longer than or equals 5 chars
            if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $uname)) { 
                $unameCriteria = "Username must have only alphanumeric characters and must be minimum 5 characters long.";
            }
            else {
                // check if username already in database
                $sql = "SELECT * FROM user WHERE uname = '$uname'";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) === 1){
                    $unameCriteria = "Username Already Exist";
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
                $sql = "SELECT * FROM user WHERE email='$email'";

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
                $confirmPasswordOK = true;
            }
            else {
                $confirmPasswordCriteria = "Passwords do not match!";
            }
        }

        $captcha = $_POST["g-recaptcha-response"];
        $secretkey = "6Ld1nA0aAAAAAJps4LCRTs7jfshN9GNjZAghnt0f";
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urldecode($secretkey).'&response='.urldecode($captcha).'';
        $response = file_get_contents($url);
        $responseKey = json_decode($response, TRUE);

        if($responseKey['success'])
        {
            if($unameOK == true && $passwordOK == true && $fnameOK == true && $lnameOK == true && $emailOK == true)
            {
                //Generate VKey
                $vkey = md5(time().$uname);

                $passHash = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO user (uname, pass, fname, lname, email, vkey)
                VALUES ('$uname', '$passHash', '$fname', '$lname', '$email', '$vkey')";

                if(mysqli_query($conn, $sql)){
                    //send mail
                    $to = $email;
                    $subject = "Email Verification";
                    $message = "<a href='http://localhost/MyFiles/CakeShop/verifyEmail.php?vkey=$vkey'>Register Account</a>";
                    $headers = "From: malako.cakeshop@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    mail($to, $subject, $message, $headers);
                    setcookie("thankYouCookie", "verificationEmailSent");
                    header('location: thankYouRegistration.php');

                    $lastUserID = mysqli_insert_id($conn);

                    $sql = "INSERT INTO cart (userID) VALUES ($lastUserID);";

                    mysqli_query($conn, $sql);
                }
            }
        }
        else {
            $recaptchaCriteria = "Please confirm the reCAPTCHA";
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
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <!--reCAPTCHA-->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

    <body>
        <?php $page = 'login';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Background Image-->
        <div class="bg-image-container">
            <div class="bg-image-join"></div>
        </div>
        <!--End Background Image-->


        <!--Start Login Panel-->
        <div class="login-page reg-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>JOIN</h3>
                        <p>Please enter the required fields below to join.</p>
                    </div>
                </div>

                <form class="login-form" method="post" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span class="Uname-Error"><?php echo $unameCriteria;?></span>  
                    <input type="text" name="uname" placeholder="Username" value="<?php echo $uname;?>"/>
                    <span class="FirstName-Error"><?php echo $fnameCriteria;?></span>
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>"/>
                    <span class="LastName-Error"><?php echo $lnameCriteria;?></span>
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"/>
                    <span class="Email-Error"><?php echo $emailCriteria;?></span>
                    <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                    <span class="Password-Error"><?php echo $passwordCriteria;?></span>
                    <input type="password" name="password" placeholder="Password"/>
                    <span class="Password-Error"><?php echo $confirmPasswordCriteria;?></span>
                    <input type="password" name="confirmPassword" placeholder="Confirm Password"/>
                    <span class=recaptcha-Error"><?php echo $recaptchaCriteria;?></span>
                    <div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="6Ld1nA0aAAAAAA7F7eJOY7CMwg7aaQAfg3WZy6P0"></div>
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