<?php

echo '
<header class="main-header-media1200">
    <nav class="nav-media1200 main-nav-media1200">

        <h1 class="business-name-media1200"><a href="index.php" class="animate__animated animate__backInDown">Malako</a></h1>

        <ul class="animate__animated animate__backInDown">
            <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>">HOME</a></li>
            <li><a href="products.php" class="<?php if($page == 'index'){echo 'active';}?>">PRODUCTS</a></li>
            <li><a href="makeyourcake.php" class="<?php if($page == 'index'){echo 'active';}?>">MAKE YOUR CAKE</a></li>
            <li><a href="about.php" class="<?php if($page == 'index'){echo 'active';}?>">ABOUT</a></li>
            <li><a href="contact.php" class="<?php if($page == 'index'){echo 'active';}?>">CONTACT US</a></li>
            <li><a href="#" class="user-button"><i class="bx bx-cart nav__cart"></i></a></li>
            <li><a href="login.php" class="<?php if($page == 'index'){echo 'active';}?>" class="user-button"><i class="far fa-user-circle"></i></a></li>
        </ul>
    </nav>
</header>
'
?>