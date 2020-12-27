<?php 

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $tel = $order = "";

    $recaptchaCriteria = "";
    $sendCriteria = "";
    $errorCriteria = "";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['customerName'];
        $email = $_POST['customerEmail'];
        $message = $_POST['customerMessage'];

        if(isset($_POST['customerPhone']))
        {
            $phone = $_POST['customerPhone'];
            $tel = "<br>Phone: ". test_input($phone) . "<br>";
        }

        if(isset($_POST['orderNumber']))
        {
            $orderNumber = $_POST['orderNumber'];
            $order = "<br>Order Number: " . test_input($orderNumber) . "<br>";
        }

        $to = "malako.cakeshop@gmail.com";
        $subject = "Contact Form from $name";
        $note = $message . $tel . $order;
        $headers = "From: $email \r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $note, $headers);
        echo "Message Sent";
    } else {
        echo "Message Not Sent!";
    }
?>