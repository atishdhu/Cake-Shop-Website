<?php
    include "./AdditionalPHP/startSession.php";
    include "./AdditionalPHP/checkAccess.php";

    $uname = $_SESSION['uname'];
    
    include "connection.php";

    $sql = "SELECT * FROM user WHERE uname='$uname'";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
    }

    $uname = $row['uname'];
    $password = $row['pass'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $address = $row['address'];
    $phone = $row['phone'];
    $description = $row['description'];

    $titleName = strtoupper($fname);

    include "./AdditionalPHP/updateProfile.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | MY ACCOUNT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <?php $page = 'checkaccount';?>
        
        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!-- Start Header -->
        <div id="screenRes" class="col-md-15">
            <div class="form-name-container">
                <div class="admin-subtitle">
                    <span><i class="fas fa-user-cog"></i></span>
                    <span>&nbspHELLO <?php echo $titleName;?></span>
                    <span class="user-logout"><a href="logout.php"><button type="button" title="Logout" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span></button></a></span>
                </div>
            </div>
        </div>
        <!-- End Header -->

        
        <!-- Start Tab -->
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="pill" href="#home">Edit Profile</a></li>
            </ul>
            
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="tab-title">
                        <h3>Edit My Profile</h3>
                    </div>
                    <!--Start User Profile-->
                    <?php include './Includes/userProfile.php'; ?>
                    <!-- End User Profile -->
                </div>
            </div>
        </div>
        <!-- End Tab -->
    </body>
</html>