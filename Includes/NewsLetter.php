<?php include "./AdditionalPHP/checkAccess.php"; ?>

<?php

    include "connection.php";

    $email = "";
    $emailCriteria = "";
    $errorCriteria = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['subscribe']))
        {
            $emailOK = false;

            if(empty($_POST['email']))
            {
                $errorCriteria = "Email is required";
            } else {
                // test_input already included in contact form, so no need to include in this file
                $email = test_input($_POST['email']);
    
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $emailCriteria = "Invalid email format!";
                } else {
                    $emailOK = true;
                }
            }
    
            if($emailOK)
            {
                $errorCriteria = "";
                $sql = "SELECT * FROM newsletter WHERE email = '$email'";
    
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result) == 1)
                {
                    $emailCriteria = "You are already subscribed!";
                }
                else
                {
                    $sql = "INSERT INTO newsletter (email) VALUES ('$email')";
    
                    if(mysqli_query($conn, $sql))
                    {
                        $emailCriteria = "Thank you for your subscription!";
                    } else {
                        $errorCriteria = "Something went wrong. Please try again later.";
                    }
                }
            }        
        } 
    }
        
?>

<section class="newsletter newsletter-section" id="subscribed">
    <div id="subscribe-section" onclick="window.location.hash='back-subscribe'; class="newsletter__container bd-grid">
        <div class="newsletter__subscribe subtitle">
            <h2 class="section-title">OUR NEWSLETTER</h2>
            <p class="newsletter__description">Be the first to get informed about our best deals!</p>
            <span class="send-input-message"><?php echo $emailCriteria;?></span>
            <span class="input-error"><?php echo $errorCriteria;?></span>
            <br><br>
            <form class="newsletter__form" method="POST" actions="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                <input class="newsletter__input"  name="email" required="" type="email" placeholder="Enter your email"/>
                <div class="subscribe-button-container" onclick="location.href='#subscribe-section';" style="cursor: pointer;">
                    <span><button class="subscribe-button" name="subscribe">SUBSCRIBE</button></span>
                </div>
            </form>
        </div>
    </div>
</section>