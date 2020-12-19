<?php
    if(!isset($_session))
    {
        session_start();
    }
    
    if(isset($_SESSION['uname'])){
        define('Access', TRUE);
        include ".\userAccount.php";
    }
    else {
        echo 'Access Denied!';
    }
?>