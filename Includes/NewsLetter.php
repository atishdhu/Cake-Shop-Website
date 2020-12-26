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
                $sql = "SELECT isSubscribed FROM user WHERE email = '$email'";
    
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_assoc($result);

                    if($row['isSubscribed'] == 1)
                    {
                        $emailCriteria = "You are already subscribed!";
                    }
                    else
                    {
                        $sql = "UPDATE user SET isSubscribed = 1 WHERE email = '$email'";

                        if(mysqli_query($conn, $sql))
                        {
                            $emailCriteria = "Thank you for subscribing! We will get back to you soon.";
                        }
                        else
                        {
                            $errorCriteria = "Something went wrong. Please try again later.";
                        }
                    }
                }
                else
                {
                    $emailCriteria = "Please create an account to subscribe to our newsletter.";
                }
            }        
        } 
    }
        
?>

<section class="newsletter newsletter-section" id="subscribed">
    <div id="subscribe-section" class="newsletter__container bd-grid" onclick="window.location.hash='subscribe-button';" style="cursor: pointer;">
        <div class="newsletter__subscribe subtitle">
            <h2 class="section-title">NEWSLETTER</h2>
            <p class="newsletter__description">Be the first to get informed about our best deals!</p>
            <form class="newsletter__form" method="POST" actions="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                <input class="newsletter__input"  name="email" required="" type="email" placeholder="Enter your email"/>
                <div class="subscribe-button-container">
                    <span><button class="subscribe-button" name="subscribe">SUBSCRIBE</button></span>
                </div>
            </form>
            <br>
            <span class="send-input-message"><?php echo $emailCriteria;?></span>
            <span class="input-error"><?php echo $errorCriteria;?></span>
        </div>
    </div>
</section>