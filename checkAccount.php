<?php
    if(!isset($_session))
    {
        session_start();
    }
    
    if(isset($_SESSION['fname'])){
        $fname = strtoupper($_SESSION['fname']);
        define('Access', TRUE);
        include "./userAccount.php";
    }
    else {
        echo 'Access Denied!';
    }
?>