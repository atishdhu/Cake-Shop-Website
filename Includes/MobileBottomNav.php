<?php include "./AdditionalPHP/checkAccess.php"; ?>

<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    if(isset($_SESSION['fname'])){
        $href = 'checkAccount.php';
    } else {
        $href = 'login.php';
    }
?>
<div class="bottom-nav-group">
    <nav class="bottom-nav">
        <a href="<?php echo $href;?>" class="bottom-nav-link">
            <i class="fas fa-user bottom-nav-icon" ></i>
            <span class="bottom-nav-text">Account</span>
        </a>
        <a href="#" class="bottom-nav-link">
            <i class="fas fa-shopping-cart"></i>
            <span class="bottom-nav-text">My Cart</span>
        </a> 
    </nav>
</div>