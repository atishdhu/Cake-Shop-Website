<?php
    if(!isset($_session))
    {
        session_start();
    }
    
    if(isset($_SESSION['uname'])){
        define('Access', TRUE);
        if($_SESSION['isAdmin'] == 1)
        {
            include ".\adminPanel.php";
        }
        else
        {
            include ".\userAccount.php";
        }
    }
    else {
        echo 'Access Denied!';
    }
?>