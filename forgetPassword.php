<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<?php
    include "connection.php";

    $email = "";
    $errCriteria = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ((empty($_POST['email']))){
            $errCriteria = "Email required";
        } else {
            $email = test_input($_POST["email"]);
            // check if name only contains letters and whitespace
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailCriteria = "Invalid email format";
            }
            else {
                $captcha = $_POST["g-recaptcha-response"];
                $secretkey = "6LdT9A0aAAAAAPb_m1z6qx8ryZzlAhr8xRTk-uP3";
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urldecode($secretkey).'&response='.urldecode($captcha).'';
                $response = file_get_contents($url);
                $responseKey = json_decode($response, TRUE);

                if($responseKey['success'])
                {
                    $sql = "SELECT * FROM user WHERE email='$email'";
                    $result= mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) === 1){
                        $row = mysqli_fetch_assoc($result);

                        $uname = $row['uname'];

                        $alphas = range('A', 'Z');
                        $numbers = range(0,26);
                        $symbols = array('@', '#', '$', '%');

                        $newPassword = "";
                        $passLength = rand(8,20);

                        for($i = 0; $i <= $passLength; $i++)
                        {
                            $a = $alphas[rand(0,25)];
                            $n = $numbers[rand(0,25)];
                            $s = $symbols[rand(0,3)];

                            $newPassword .= $a . $n . $s;
                        }

                        $to = $row['email'];
                        $subject = "Reset Password";
                        $message = "Username: <b>$uname</b><br>Password: <b>$newPassword</b><br><br><b>Please reset your password after you login.</b>";
                        $headers = "From: malako.cakeshop@gmail.com \r\n";
                        $headers .= "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        mail($to, $subject, $message, $headers);

                        $passHash = password_hash($newPassword, PASSWORD_BCRYPT);

                        $sql = "UPDATE user SET pass='$passHash' WHERE uname='$uname'";

                        if(mysqli_query($conn, $sql)){
                            setcookie("resetPassword","resetMailSent");
                            header('location: passwordResetPage.php');
                        }
                    } else {
                        $errCriteria = "Cannot find your account!";
                    }
                    
                } else {
                    $errCriteria = "Please confirm the reCAPTCHA";
                }
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
        <title>MALAKO | RESET PASSWORD</title>
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
        <?php $page = 'forgetpassword';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';;?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->

        <!--Start Background Image-->
        <div class="bg-image-container">
            <div class="bg-image-forget"></div>
        </div>
        <!--End Background Image-->

        <!--Start ForgetPassword Panel-->
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>RESET PASSWORD</h3>
                        <p>Enter your email below</p>
                    </div>
                </div>

                <form class="login-form" method="post" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                    <span class="input-error"><?php if($errCriteria != ""){echo "$errCriteria <br><br>";}?></span>
                    <div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="6LdT9A0aAAAAAPLi4Ab29xdM28aipZ0D3IyXbjXQ"></div>
                    <button>Reset Password</button>
                </form>
            </div>
        </div>
        <!--End Login Panel-->

        
    </body>
</html>