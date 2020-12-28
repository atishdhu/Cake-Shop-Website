<?php
    define('Access', TRUE);

    //SESSION START
    include "./AdditionalPHP/startSession.php";

    //DATABASE CONNECTION  cakeshop
    include_once 'connection.php';

    $validated = false;

    // define variables and set to empty values
    $fname = $lname = $email = $address = $country = $city = $zip = $paymentMethod = $ccname = $ccnum = $ccexp_m =$ccexp_y = $cccvv = "";
    $fnameErr = $lnameErr = $emailErr = $addressErr = $countryErr = $cityErr = $zipErr = $paymentMethodErr = $ccnameErr = $ccnumErr = $ccexpErr = $cccvvErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //FIRST NAME VALIDATION
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
        $fnameErr = "Only letters and white space allowed";
        }

        //LAST NAME VALIDATION
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
        }
    
        //EMAIL VALIDATION
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
        
        //ADDRESS VALIDATION
        $address = test_input($_POST["address_checkout"]);
        // check if email contains numbers at the start, followed by letters, contains space, hyphen and comma
        if (!preg_match("^[0-9a-zA-Z\s,-]+$",$address)) {
        $addressErr = "Invalid address";
        }

        //COUNTRY VALIDATION
        $country = test_input($_POST["country"]);
        // check if country == mauritius
        if ($country != "Mauritius" || $country != "mauritius" ) {
        $addressErr = "Sorry, we currently deliver in Mauritius only.";
        }

        //CITY VALIDATION
        $city = test_input($_POST["city"]);
        // check if city == options
        if ($city != "PortLouis" || $city != "Curepipe" || $city != "Vacoas" || $city != "QuatreBornes" || $city != "RoseHill" || $city != "FlicEnFlac" || $city != "Phoenix") {
        $cityErr = "Invalid city";
        }

        //ZIP VALIDATION
        $zip = test_input($_POST["zip"]);
        // check if zip contains exactly 5 numbers
        if (!preg_match("^[0-9]{5}",$zip)) {
        $zipErr = "Invalid zip code";
        }
    
        //PAYMENT METHOD VALIDATION
        $paymentMethod = test_input($_POST["paymentMethod"]);

        //REGEX BY CARD TYPE
        $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/"
        
        );


        //CC NAME VALIDATION
        $ccname = test_input($_POST["ccname"]);
        // check if ccname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$ccname)) {
        $ccnameErr = "Only letters and white space allowed";
        }

        //CC NUM VALIDATION
        $ccnum = test_input($_POST["ccnum"]);
        // check if ccnum matches regex by supported card types
        if (!preg_match($cardtype['visa'],$ccnum) || !preg_match($cardtype['mastercard'],$ccnum)) {
        $ccnumErr = "Invalid card number
        <br>
        We are sorry! Our system currently supports VISA and MasterCard only.";
        }


        //CC EXPIRATION DATE VALIDATION
        if (empty($_POST["ccexp_m"]) || empty($_POST["ccexp_y"])) {
        $ccexpErr = "Please enter the expiration date";
        } 
        else {
            $ccexp_m = test_input($_POST["ccexp_m"]);
            $ccexp_y = test_input($_POST["ccexp_y"]);

            //VALIDATES MONTH
            if((int)$ccexp_m > 0 && (int)$ccexp_m < 13){
                //VALIDATES YEAR
                if((int)$ccexp_y > 1900 && (int)$ccexp_y < 4000){
                $expires = \DateTime::createFromFormat('my', $ccexp_m.$ccexp_y);
                $now = new \DateTime();
                //CHECK IF EXPIRED
                if ($expired < $now) {
                    $ccexpErr = "Your credit card has expired";
                }
                }
                else {
                $ccexpErr = "Invalid year";
                }
            }
            else {
                $ccexpErr = "Invalid expiration date";
            }
        }


        //CC CVV VALIDATION
        $cccvv = test_input($_POST["cccvv"]);
        // check if CVV contains has 3 or 4 digits and is
        //between 0-9 and does not have any alphabets and special characters.
        if (!preg_match("^[0-9]{3, 4}$",$cccvv)) {
            $cccvvErr = "Invalid CVV";
        }

        if($fnameErr = $lnameErr = $emailErr = $addressErr = $countryErr = $cityErr = $zipErr = $paymentMethodErr = $ccnameErr = $ccnumErr = $ccexpErr = $cccvvErr = ""){
            $validated = true;
        }

    
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    

?>

