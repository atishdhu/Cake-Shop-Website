<?php

    include "connection.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST['email'];

        $sql = "SELECT isSubscribed FROM user WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);

            if($row['isSubscribed'] == 1)
            {
                echo "You are already subscribed!";
            }
            else
            {
                $sql = "UPDATE user SET isSubscribed = 1 WHERE email = '$email'";

                if(mysqli_query($conn, $sql))
                {
                    echo "Thank you for subscribing! We will get back to you soon.";
                }
                else
                {
                    echo "Something went wrong. Please try again later.";
                }
            }
        }
        else
        {
            echo "Please create an account to subscribe to our newsletter.";
        }     
    }
         
?>