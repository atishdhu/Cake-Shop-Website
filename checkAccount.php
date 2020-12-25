<?php
    include "./AdditionalPHP/startSession.php";
    
    if(isset($_SESSION['uname'])){
        define('Access', TRUE);
        if($_SESSION['isAdmin'] == 1)
        {
            include "adminPanel.php";
        }
        else
        {
            include "userAccount.php";
        }
    }
    else {
        include "login.php";
    }
?>