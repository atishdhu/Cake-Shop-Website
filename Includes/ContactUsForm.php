<?php include "./AdditionalPHP/checkAccess.php"; ?>

<?php 

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = $email = $phone = $message = $orderNumber = "";
    $nameCriteria = "";
    $emailCriteria = "";
    $phoneCriteria = "";
    $messageCriteria = "";
    $sendCriteria = "";
    $recaptchaCriteria = "";
    $errorCriteria = "";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST['submit-contact-form']))
        {
            $nameOK = false;
            $emailOK = false;
            $phoneOK = true;
            $orderNumber = false;
            $messageOK = false;

            if(empty($_POST["customerName"]))
            {
                $nameCriteria = "Name is required";
            } else {
                $name = test_input($_POST['customerName']);

                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameCriteria = "Only letters and white space allowed";
                } else {
                    $nameOK = true;
                }
            }

            if(empty($_POST["customerEmail"]))
            {
                $emailCriteria = "Email is required";
            } else {
                $email = test_input($_POST["customerEmail"]);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailCriteria = "Invalid email format";
                } else {
                    $emailOK = true;
                }
            }

            if(!empty($_POST["customerPhone"]))
            {
                $phone = test_input($_POST["customerPhone"]);

                if (!preg_match("/^([0-9]{8}|[0-9]{7})*$/",$phone)) {
                    $phoneCriteria = "Enter a valid phone number";
                    $phoneOK = false;
                }
            }

            if(!empty($_POST["orderNumber"]))
            {
                $orderNumber = test_input($_POST["orderNumber"]);
            }

            if(empty($_POST["customerMessage"]))
            {
                $messageCriteria = "Please enter a message before submitting.";
            } else {
                $message = test_input($_POST["customerMessage"]);

                $messageOK = true;
            }

            if($nameOK && $emailOK && $messageOK && $phoneOK)
            {
                $captcha = $_POST["g-recaptcha-response"];
                $secretkey = "6Lfz1g4aAAAAAKOGGmJ4Yy7cn9aiYxgAr2fPUCwM";
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urldecode($secretkey).'&response='.urldecode($captcha).'';
                $response = file_get_contents($url);
                $responseKey = json_decode($response, TRUE);

                if($responseKey['success']){
                    if(!empty($_POST["customerPhone"]))
                    {
                        $tel = "<br>Phone: ". test_input($_POST["customerPhone"]) . "<br>";
                    }
        
                    if(!empty($_POST["orderNumber"]))
                    {
                        $order = "<br>Order Number: " . test_input($_POST["orderNumber"]) . "<br>";
                    }
        
                    $to = "malako.cakeshop@gmail.com";
                    $subject = "Contact Form from $name";
                    $note = $message . $tel . $order;
                    $headers = "From: $email \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                    mail($to, $subject, $note, $headers);
                    $name = "";
                    $email = "";
                    $phone = "";
                    $orderNumber = "";
                    $message = "";
                    $errorCriteria = "";
                    header("location: $_SERVER[PHP_SELF]");
                    $sendCriteria = "Thank you for your message. We will get back to you soon!";
                } else {
                    $errorCriteria = "Message Not Sent!";
                    $recaptchaCriteria = "Please confirm the reCAPTCHA.";
                }
            } else {
                $errorCriteria = "Message Not Sent!";
            }
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
            <span class="send-input-message"><?php echo $sendCriteria;?></span>
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
            <textarea id="customerNote" name="customerMessage" required rows="4"><?php echo $message;?></textarea>
            
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