<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fnameCriteria = "";
    $lnameCriteria = "";
    $addressCriteria = "";
    $phoneCriteria = "";
    $currentPasswordCriteria = "";
    $newPasswordCriteria = "";
    $confirmPasswordCriteria = "";
    $delPasswordCriteria = "";

    $updateMessage = "";
    $passwordMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['updateProfile'])){
            $fnameOK = false;
            $lnameOK = false;
            $addressOK = false;
            $phoneOK = false;

            if (empty($_POST["fname"])) {
                $fnameCriteria = "First name is required";
            } else {
                $fname = test_input($_POST["fname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
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
                if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
                    $lnameCriteria = "Only letters and white space allowed";
                }
                else
                {
                    $lnameOK = true;
                }
            }

            if (empty($_POST["address"])) {
                $addressCriteria = "Address is required";
            } else {
                $address = test_input($_POST["address"]);
                $addressOK = true;
            }

            if (empty($_POST["phone"])) {
                $phoneCriteria = "Phone number is required";
            } else {
                $phone = test_input($_POST["phone"]);

                if (!preg_match("/^([0-9]{8}|[0-9]{7})*$/", $phone)) {
                    $phoneCriteria = "Enter a valid phone number";
                }
                else
                {
                    $phoneOK = true;
                }   
            }

            if (!empty($_POST["description"])) {
                $description = test_input($_POST["description"]);
            }

            if($fnameOK == true && $lnameOK == true && $addressOK == true && $phoneOK == true)
            {
                $sql = "UPDATE user SET fname='$fname', lname='$lname', address='$address', phone='$phone', description='$description' WHERE uname='$uname'";

                if(mysqli_query($conn, $sql))
                {
                    $updateMessage = '<i class="fas fa-check-square"></i>&nbsp&nbspRecord Updated!';
                }
                else {
                    $updateMessage = "Error Updating Records. Please try again later.";
                }
            }
        } else if(isset($_POST['revertProfile'])){
            Header('Location: '.$_SERVER['PHP_SELF']);

        } else if(isset($_POST['updatePassword'])){
            if (empty($_POST["currentPassword"])) {
                $currentPasswordCriteria = "Current password empty!";
            } else {
                $currentPassword = test_input($_POST["currentPassword"]);

                if(password_verify($currentPassword, $password)){

                    $newPassword = $_POST['newPassword'];
                    $confirmPassword = $_POST['confirmPassword'];

                    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $newPassword)) {
                        $newPasswordCriteria = 'Password does not meet requirements!';
                    } else if (!($newPassword == $confirmPassword))
                    {
                        $confirmPasswordCriteria = 'Passwords do not match';
                    } else {
                        $passHash = password_hash($newPassword, PASSWORD_BCRYPT);

                        $sql = "UPDATE user SET pass='$passHash' WHERE uname='$uname'";
                        if(mysqli_query($conn, $sql)){
                            $passwordMessage = "Password Updated!";
                            include "logout.php";
                            header("Location: login.php");
                        }
                    }
                }
                else
                {
                    $currentPasswordCriteria = "Current Password Incorrect!";
                }
            }
        } else if(isset($_POST['clearPassword'])){
            $_POST['currentPassword'] = "";
            $_POST['newPassword'] = "";
            $_POST['confirmPassword'] = "";

        } else if(isset($_POST['deleteAccount'])){
            if (empty($_POST["delPassword"])) {
                $delPasswordCriteria = "Current password empty!";
            } else {
                $delPassword = test_input($_POST["delPassword"]);

                if(password_verify($delPassword, $password)){
                    $sql = "DELETE FROM user WHERE uname='$uname'";

                    if(mysqli_query($conn, $sql)){
                        include "logout.php";
                        header("Location: index.php");
                    }
                }
                else
                {
                    $delPasswordCriteria = "Password Incorrect";
                }
            }
        }
    }
?>