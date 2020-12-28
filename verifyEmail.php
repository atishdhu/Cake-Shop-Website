<?php 
    include "connection.php";

    if(isset($_GET['vkey'])){
        // Process Verification
        $vkey = $_GET['vkey'];

        $sql = "SELECT verified,vkey FROM user WHERE verified = 0 AND vkey = '$vkey' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            // Validate Email
            $update = "UPDATE user SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";

            $resultSet = mysqli_query($conn, $update);
            
            if($resultSet)
            {
                define('Access', TRUE);
                include "accountVerifiedPage.php";
            } else {
                echo $conn->error;
            }

        } else {

            $sql = "SELECT verified,vkey FROM user WHERE verified = 1 AND vkey = '$vkey' LIMIT 1";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                define('Access', TRUE);
                include "accountVerifiedPage.php";
            } else {
                define('Access', TRUE);
                setcookie("verifiedEmailCookie", "emailInvalid", time()+(3600*24*2));
                include "accountInvalidPage.php";
            }
            
        }

    } else {
        die("Something went wrong!");
    }
?>