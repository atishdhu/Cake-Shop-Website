<?php 
    $servername = "localhost";
    $serverUsername = "root";
    $serverPassword = "";
    $db_name = "malako";

    // Create connection
    $conn = new mysqli($servername, $serverUsername, $serverPassword, $db_name);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>