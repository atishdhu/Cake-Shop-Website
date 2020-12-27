<?php include "./AdditionalPHP/checkAccess.php"; ?>

<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    $uname = "Account";
    $icon = "fas fa-user bottom-nav-icon";

    if(isset($_SESSION['uname'])){
        $href = 'checkAccount.php';
        $uname = $_SESSION['uname'];
        $icon = "fas fa-user-check";
    } else {
        $href = 'login.php';
    }
?>

<div class="bottom-nav-group">
    <nav class="bottom-nav">
        <a href="<?php echo $href;?>" class="bottom-nav-link">
            <i class="<?php echo $icon;?>" ></i>
            <span class="bottom-nav-text"><?php echo $uname;?></span>
        </a>
        <a href="cart.php" class="bottom-nav-link">
            <i class="fas fa-shopping-cart"></i>
            <span class="bottom-nav-text">My Cart</span>
        </a> 
    </nav>
</div>