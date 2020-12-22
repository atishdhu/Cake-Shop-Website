<?php
    include "./AdditionalPHP/startSession.php";
    include "./AdditionalPHP/checkAccess.php";

    $uname = $_SESSION['uname'];
    
    include "connection.php";

    $sql = "SELECT * FROM users WHERE uname='$uname'";
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

    // if(isset($_POST['sendMail'])){
    //     if(!empty($_POST['message'])) {
    //         $sql = "SELECT email FROM users";
    //         $result= mysqli_query($conn, $sql);

    //         if(mysqli_num_rows($result) > 0){
    //             $row = mysqli_fetch_assoc($result);

    //             for($i = 0; $i < mysqli_num_rows($result); $i++)
    //             {
                    
    //             }
    //         }
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | ADMIN PANEL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- include libraries(jQuery, bootstrap) -->

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
        <!-- Bootstrap CDN -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    </head>

    <body>
        <?php $page = 'checkaccount';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <header class="main-header-media1200">
            <nav class="nav-media1200 main-nav-media1200">

                <h1 class="business-name-media1200"><a href="index.php" class="animate__animated animate__backInDown">Malako</a></h1>

                <ul class="animate__animated animate__backInDown">
                    <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>">HOME</a></li>
                    <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>">PRODUCTS</a></li>
                    <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>">MAKE YOUR CAKE</a></li>
                    <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>">ABOUT</a></li>
                    <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>">CONTACT US</a></li>
                    <li><a href="checkAccount.php" class="active user-button"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </nav>
        </header>
        <!--End Navigation Bar @media 1200px-->

        
        <div id="screenRes" class="col-md-15">
            <div class="form-name-container">
                <div class="adminPanelContainer">
                    <div class="adminPanelSubtitle">
                        <h2>ADMIN PANEL</h2>
                    </div>
                </div>
                
                <div class="admin-subtitle">
                    <span><i class="fas fa-users-cog"></i></span>
                    <span>&nbspHELLO <?php echo $titleName;?></span>
                    <span class="user-logout"><a href="logout.php"><button type="button" title="Logout" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span></button></a></span>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="pill" href="#home">Edit Profile</a></li>
                <li><a data-toggle="pill" href="#sendMail">Send Mail</a></li>
            </ul>
            
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Edit Admin Profile</h3>
                    <!--Start User Profile-->
                    <div class="container user-profile-container">
                        <div class="row">
                            <div id="screenRes" class="col-md-15">
                                <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <fieldset>
                                        <!-- Form Name -->
                                        <div class="form-spacer">
                                            <br>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="Username ">Username </label>  
                                            <div class="col-md-1">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-check"></i>
                                                    </div> 
                                                    <label class="col-md-4 control-label" for="Username "><?php echo $uname;?></label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <span class="input-error"><?php echo $fnameCriteria;?></span>
                                            <label class="col-md-4 control-label" for="First Name">First Name</label>  
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input value = "<?php echo $fname;?>" id="First Name" name="fname" type="text" placeholder="First Name" class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <span class="input-error"><?php echo $lnameCriteria;?></span>
                                            <label class="col-md-4 control-label" for="Last Name ">Last Name </label>  
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input value = "<?php echo $lname;?>" id="Last Name " name="lname" type="text" placeholder="Last Name " class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <span class="input-error"><?php echo $addressCriteria;?></span>
                                            <label class="col-md-4 control-label" for="Address ">Address </label>  
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-map-marked-alt"></i>
                                                    </div>
                                                    <input value = "<?php echo $address;?>" id="Address " name="address" type="text" placeholder="Enter Address " class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <span class="input-error"><?php echo $phoneCriteria;?></span>
                                            <label class="col-md-4 control-label" for="Phone Number ">Phone Number </label>  
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone"></i> 
                                                    </div>
                                                    <input value = "<?php echo $phone;?>" id="Phone Number " name="phone" type="text" placeholder="Phone Number " class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
                                            <div class="col-md-1">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <label class="col-md-4 control-label" for="Email Address "><?php echo $email;?></label>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="Overview (max 200 words)">A little bit about myself</label>
                                            <div class="col-md-4">                     
                                                <textarea class="form-control" rows="10"  id="Overview (max 200 words)" name="description" placeholder="Overview (max 200 words)"><?php echo $description;?></textarea>
                                            </div>
                                        </div>

                                            
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" ></label>  
                                            <div class="col-md-4">
                                                <button name="updateProfile" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Update</button>
                                                <button name="revertProfile" class="btn btn-danger" value=""><span class="glyphicon glyphicon-repeat"></span> Revert</button>
                                                <span class="message"><?php echo "&nbsp&nbsp <b>$updateMessage</b>";?></span>
                                            </div> 
                                        </div>

                                        <!-- Text input-->
                                        <br>
                                        <hr>
                                        <div class="change-password-container">
                                            <div class="change-password-subtitle">
                                                <h3>Change Password</h3>
                                                <p><i class="fas fa-exclamation-triangle"></i>&nbsp&nbspYou will need to log back in right after the password has been updated.</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <span class="input-error"><?php echo $currentPasswordCriteria;?></span>
                                            <label class="col-md-4 control-label" for="Current Password ">Current Password </label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-unlock-alt"></i>
                                                    </div>
                                                    <input type="password" id="Current Password " name="currentPassword" type="text" placeholder="Enter Current Password " class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                    
                                        <!-- Text input-->
                                        <div class="form-group">
                                        <span class="input-error"><?php echo $newPasswordCriteria;?></span>
                                            <label class="col-md-4 control-label" for="New Password ">New Password </label>  
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                    <input type="password" id="New Password " name="newPassword" type="text" placeholder="Enter New Password " class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                        <span class="input-error"><?php echo $confirmPasswordCriteria;?></span>
                                            <label class="col-md-4 control-label" for="Confirm Password ">Confirm Password </label>  
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                    <input type="password" id="Confirm Password " name="confirmPassword" type="text" placeholder="Confirm Password " class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" ></label>  
                                            <div class="col-md-4">
                                                <button name="updatePassword" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Update</button>
                                                <button name="clearPassword" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Clear</button>
                                                <span class=message"><?php echo "&nbsp&nbsp <b>$passwordMessage</b>";?></span>
                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <div class="danger-zone">
                                            <div class="danger-zone-inside">
                                                <div class="change-password-container">
                                                    <div class="change-password-subtitle">
                                                        <h3>Delete Account</h3>
                                                        <p><i class="fas fa-exclamation-triangle"></i>&nbsp&nbspWarning: Your account will be <b>permanently deleted</b>. Please be certain.</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="input-error"><?php echo $delPasswordCriteria;?></span>
                                                    <label class="col-md-4 control-label" for="Current Password ">Password </label>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fas fa-unlock-alt"></i>
                                                            </div>
                                                            <input type="password" id="Current Password " name="delPassword" type="text" placeholder="Confirm Your Password" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" ></label>  
                                                    <div class="col-md-4">
                                                        <button name="deleteAccount" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Delete Account</button>
                                                        <span class=message"><?php echo "&nbsp&nbsp <b>$passwordMessage</b>";?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="form-spacer">
                        <br><br><br><br><br>
                    </div>
                    <!-- End User Profile -->
                </div>
                
                        
                <div id="sendMail" class="tab-pane fade">
                    <h3>Send Mail To Subscribers</h3>
                    <div class="container mt-5 mb-5">
                        <div class="sendMailBtnContainer">
                            <button name="sendMail" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> Send Mail</button>
                        </div>

                        <br>
                        <form method="POST" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="textAreaContainer">
                                <textarea rows="10" id="summernote" name="message">
                                    
                                </textarea>
                            </div>
                        </form>
                    </div>
                    
                        
                    <script>
                        $(document).ready(function() {
                            $('#summernote').summernote({
                                placeholder: 'Malako',
                                height: 500,
                                toolbar: [
                                    // [groupName, [list of button]]
                                    ['basic', ['style', 'fontname', 'fontsize']],
                                    ['style', ['bold', 'italic', 'underline', 'clear']],
                                    ['font', ['strikethrough', 'superscript', 'subscript']],
                                    ['color', ['color']],
                                    ['media', ['link', 'picture', 'video', 'table', 'hr']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['height', ['height', 'codeview', 'fullscreen', 'undo', 'redo']]
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        
        <!-- Start Bottom Nav -->   
        <div class="bottom-nav-group">
            <nav class="bottom-nav">
                <a href="checkAccount.php" class="bottom-nav-link">
                    <i class="fas fa-user-check" ></i>
                    <span class="bottom-nav-text"><?php echo $uname;?></span>
                </a>
            </nav>
        </div>
        <!-- End Bottom Nav --> 
    </body>
</html>