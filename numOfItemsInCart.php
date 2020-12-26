<?php
    include "./AdditionalPHP/startSession.php";

    if(isset($_SESSION['shopping_cart']))
    {
        foreach($_SESSION['shopping_cart'] as $key => $item){
            $_SESSION['item_quantity'] = $_SESSION['item_quantity'] + $item['quantity'];
        }
    }
    else
    {
        $_SESSION['item_quantity'] = 0;
    }
?>