<?php include "./AdditionalPHP/checkAccess.php"; ?>

<?php 

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $recaptchaCriteria = "";
    $errorCriteria = "";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['customerName'];
        $email = $_POST['customerEmail'];
        $phone = $_POST['customerPhone'];
        $message = $_POST['customerMessage'];
        $orderNumber = $_POST['orderNumber'];

        if(isset($_POST['submit-contact-form']))
        {

            $captcha = $_POST["g-recaptcha-response"];
            $secretkey = "6Lfz1g4aAAAAAKOGGmJ4Yy7cn9aiYxgAr2fPUCwM";
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urldecode($secretkey).'&response='.urldecode($captcha).'';
            $response = file_get_contents($url);
            $responseKey = json_decode($response, TRUE);

            if($responseKey['success']){
                if(!empty($phone))
                {
                    $tel = "<br>Phone: ". test_input($phone) . "<br>";
                }
    
                if(!empty($orderNumber))
                {
                    $order = "<br>Order Number: " . test_input($orderNumber) . "<br>";
                }
    
                $to = "malako.cakeshop@gmail.com";
                $subject = "Contact Form from $name";
                $note = $message . $tel . $order;
                $headers = "From: $email \r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
                mail($to, $subject, $note, $headers);
            } else {
                $errorCriteria = "Message Not Sent!";
                $recaptchaCriteria = "Please confirm the reCAPTCHA.";
            }
        } else {
            $errorCriteria = "Message Not Sent!";
        }
    }
?>

<!--reCAPTCHA-->
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script defer src="validateContactInput.js"></script>
</head>


<div id="contact-submission" class="contact-section">
    <div class="contact-us">
        <div class="subtitle">
            <h2>CONTACT US</h2>
            <p>Our Company is the best, meet the creative team that never sleeps. Say something to us we will answer to you.</p>
            <span class="send-input-message"><?php echo $errorCriteria;?></span>
            <span id="sendError" class="input-error"></span>
        </div>

        <form id="contactForm" method="POST" >
            <label for="customerName">NAME <em>&#x2a;</em></label>
            <span id="nameError"class="input-error"></span>
            <input id="customerName" name="customerName" required type="text" />

            <label for="customerEmail">EMAIL <em>&#x2a;</em></label>
            <span id="emailError" class="input-error"></span>
            <input id="customerEmail" name="customerEmail" required type="email" />

            <label for="customerPhone">PHONE</label>
            <span id="phoneError" class="input-error"></span>
            <input id="customerPhone" name="customerPhone" type="tel"/>
            
            <label for="orderNumber">ORDER NUMBER</label>
            <input id="orderNumber" name="orderNumber" type="text" />
            
            <label for="customerNote">YOUR MESSAGE <em>&#x2a;</em></label>
            <span class="input-error"></span>
            <textarea id="customerNote" name="customerMessage" required rows="4"></textarea>
            
            <br>
            <div class="captcha-error-container">
                <span id="" class="captchaError input-error"><?php echo $recaptchaCriteria;?></span>
            </div>
            <br>
            <div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="6Lfz1g4aAAAAAAzP8WsmD_FI4TTNX7mZ2gdeHIJF"></div>
            
            <div class="push-button">
                <span><button id="submit" name="submit">SUBMIT</button></span>
            </div>
        </form>
    </div>
</div>