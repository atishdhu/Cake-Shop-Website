<?php 
    $servername = "localhost";
    $serverUsername = "root";
    $serverPassword = "";
    $db_name = "demo";

    if(isset($_GET['vkey'])){
        // Process Verification
        $vkey = $_GET['vkey'];

        $conn = new mysqli($servername, $serverUsername, $serverPassword, $db_name);

        $sql = "SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            // Validate Email
            $update = "UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";

            $resultSet = mysqli_query($conn, $update);
            
            if($resultSet)
            {
                echo "Your account has been verified. You may now login.";
            } else {
                echo $conn->error;
            }

        } else {
            echo "This account is invalid or already verified!";
        }

    } else {
        die("Something went wrong!");
    }
?>