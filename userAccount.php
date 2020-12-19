<?php include "./AdditionalPHP/checkAccess.php"; ?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | MY ACCOUNT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <?php $page = 'useraccount';?>
        
        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';;?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!--Start User Profile-->
        <div class="container user-profile-container">
        <div class="row">
        <div class="col-md-10 ">
        <form class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <div class="form-spacer">
                    <br>
                </div>

                <div class="form-name-container">
                    <div class="subtitle">
                        <span><i class="fas fa-address-card"></i></span>
                        <span>&nbspHELLO <?php echo $fname; ?></span>
                        <span class="user-logout"><a href="logout.php"><button type="button" title="Logout" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span></button></a></span>
                        <hr>
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-5 control-label" for="First Name">First Name</label>  
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                                <input id="First Name" name="First Name" type="text" placeholder="First Name" class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Last Name ">Last Name </label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="Last Name " name="Last Name " type="text" placeholder="Last Name " class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Address ">Address </label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <input id="Address " name="Address " type="text" placeholder="Address " class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Phone number ">Phone number </label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i> 
                                </div>
                                <input id="Phone number " name="Phone number " type="text" placeholder="Phone number " class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Email Address">Email Address</label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input id="Email Address" name="Email Address" type="text" placeholder="Email Address" class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Overview (max 200 words)">Little bit about myself</label>
                        <div class="col-md-5">                     
                            <textarea class="form-control" rows="10"  id="Overview (max 200 words)" name="Overview (max 200 words)" placeholder="Overview (max 200 words)"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" ></label>  
                        <div class="col-md-5">
                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a>
                            <a href="#" class="btn btn-danger" value=""><span class="glyphicon glyphicon-repeat"></span> Revert</a>
                        </div>
                    </div>

                    <!-- Text input-->
                    <br>
                    <hr>
                    <div class="change-password-container">
                        <div class="change-password-subtitle">
                            <h3>Change Password</h3>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Current Password ">Current Password </label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-unlock-alt"></i>
                                </div>
                                <input id="Current Password " name="Current Password " type="text" placeholder="Enter Current Password " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="New Password ">New Password </label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-key"></i>
                                </div>
                                <input id="New Password " name="New Password " type="text" placeholder="Enter New Password " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="Confirm Password ">Confirm Password </label>  
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-key"></i>
                                </div>
                                <input id="Confirm Password " name="Confirm Password " type="text" placeholder="Confirm Password " class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" ></label>  
                        <div class="col-md-5">
                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a>
                            <a href="#" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Clear</a>
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
    
    </body>
</html>