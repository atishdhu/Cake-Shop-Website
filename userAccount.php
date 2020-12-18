<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>MALAKO | MY ACCOUNT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous"> -->
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    </head>

    <body>
        <!--Start Navigation Bar-->
        <?php $page = 'useraccount';?>
        <header class="main-header">
            <nav class="nav main-nav">

                <input type="checkbox" id="check">
                
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars animate__animated animate__backInDown"></i>
                </label>

                <h1 class="business-name"><a href="index.html" class="animate__animated animate__backInDown">Malako</a></h1>

                <ul>
                    <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>" href="index.php">HOME</a></li>
                    <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>" href="products.php">PRODUCTS</a></li>
                    <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>" href="makeyourcake.php">MAKE YOUR CAKE</a></li>
                    <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>" href="about.php">ABOUT</a></li>
                    <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>" href="contact.php">CONTACT US</a></li>
                </ul>
            </nav>
        </header>
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
                    <li><a href="#" class="user-button"><i class="bx bx-cart nav__cart"></i></a></li>
                    <li><a href="login.php" class="<?php if($page == 'useraccount'){echo 'active';}?> user-button"><i class="far fa-user-circle"></i></a></li>
                </ul>
            </nav>
        </header>
        <!--End Navigation Bar @media 1200px-->


        <!--Start User Profile-->
        <div class="container">
        <div class="row">
        <div class="col-md-10 ">
        <form class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <legend>User profile form requirement</legend>
                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label" for="Name (Full name)">Name (Full name)</label>  
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                                <input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="Name (Full name)" class="form-control input-md">
                            </div>
                        </div>
                    </div>
                
                    <!-- File Button --> 
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
                        <div class="col-md-4">
                            <input id="Upload photo" name="Upload photo" class="input-file" type="file">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-birthday-cake"></i>    
                                </div>
                                <input id="Date Of Birth" name="Date Of Birth" type="text" placeholder="Date Of Birth" class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Father">Father's name</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-male" style="font-size: 20px;"></i> 
                                </div>
                                <input id="Father" name="Father" type="text" placeholder="Father's name" class="form-control input-md">
                            </div>
                            
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Mother">Mother's Name</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-female" style="font-size: 20px;"></i>  
                                </div>
                                <input id="Mother" name="Mother" type="text" placeholder="Mother's Name" class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Gender">Gender</label>
                        <div class="col-md-4"> 
                            <label class="radio-inline" for="Gender-0">
                                <input type="radio" name="Gender" id="Gender-0" value="1" checked="checked">
                                Male
                            </label> 
                            <label class="radio-inline" for="Gender-1">
                                <input type="radio" name="Gender" id="Gender-1" value="2">
                                Female
                            </label> 
                            <label class="radio-inline" for="Gender-2">
                                <input type="radio" name="Gender" id="Gender-2" value="3">
                                Other
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="radios">Marital Status:</label>
                        <div class="col-md-4"> 
                            <label class="radio-inline" for="radios-0">
                                <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                                Married
                            </label> 
                            <label class="radio-inline" for="radios-1">
                                <input type="radio" name="radios" id="radios-1" value="2">
                                Unmarried
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label col-xs-12" for="Permanent Address">Permanent Address</label>  
                        <div class="col-md-2  col-xs-4">
                            <input id="Permanent Address" name="Permanent Address" type="text" placeholder="District" class="form-control input-md ">
                        </div>
                        <div class="col-md-2 col-xs-4">
                            <input id="Permanent Address" name="Permanent Address" type="text" placeholder="Area" class="form-control input-md ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Permanent Address"></label>  
                        <div class="col-md-2  col-xs-4">
                            <input id="Permanent Address" name="Permanent Address" type="text" placeholder="Street" class="form-control input-md ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label col-xs-12" for="Temporary Address">Temporary Address</label>  
                        <div class="col-md-2  col-xs-4">
                            <input id="Temporary Address" name="Temporary Address" type="text" placeholder="District" class="form-control input-md ">
                        </div>
                        <div class="col-md-2 col-xs-4">
                            <input id="Temporary Address" name="Temporary Address" type="text" placeholder="Area" class="form-control input-md ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Temporary Address"></label>  
                        <div class="col-md-2  col-xs-4">
                            <input id="Temporary Address" name="Temporary Address" type="text" placeholder="Street" class="form-control input-md ">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Primary Occupation">Primary Occupation</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>  
                                </div>
                                <input id="Primary Occupation" name="Primary Occupation" type="text" placeholder="Primary Occupation" class="form-control input-md">
                            </div> 
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Secondary Occupation (if any)">Secondary Occupation (if any)</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <input id="Secondary Occupation (if any)" name="Secondary Occupation (if any)" type="text" placeholder="Secondary Occupation (if any)" class="form-control input-md">
                            </div> 
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Skills">Skills</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-graduation-cap"></i>  
                                </div>
                                <input id="Skills" name="Skills" type="text" placeholder="Skills" class="form-control input-md">
                            </div> 
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Phone number ">Phone number </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i> 
                                </div>
                                <input id="Phone number " name="Phone number " type="text" placeholder="Primary Phone number " class="form-control input-md">
                            </div>
                            <div class="input-group othertop">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
                                </div>
                                <input id="Phone number " name="Secondary Phone number " type="text" placeholder=" Secondary Phone number " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <input id="Email Address" name="Email Address" type="text" placeholder="Email Address" class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Availability time">Availability time</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i> 
                                </div>
                                <input id="Availability time" name="Availability time" type="text" placeholder="Availability time" class="form-control input-md">
                            </div>   
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Available Service Area">Available Service Area</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-street-view"></i>  
                                </div>
                            <input id="Available Service Area" name="Available Service Area" type="text" placeholder="Available Service Area" class="form-control input-md">     
                            </div>  
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Citizenship No.">Citizenship No.</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sticky-note-o"></i>   
                                </div>
                                <input id="Citizenship No." name="Citizenship No." type="text" placeholder="Citizenship No." class="form-control input-md">      
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Languages Known">Languages Known</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="Languages Known-0">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-0" value="1">
                                    Nepali
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Languages Known-1">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-1" value="2">
                                    Newari
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Languages Known-2">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-2" value="3">
                                    English
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Languages Known-3">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-3" value="4">
                                    Hindi
                                </label>
                            </div>
                            <div class="othertop">
                                <label for="Languages Known-4"></label>
                                <input type="input" name="LanguagesKnown" id="Languages Known-4"  placeholder="Other Language">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="License No.">License No.</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sticky-note-o"></i>   
                                </div>
                                <input id="License No." name="License No." type="text" placeholder="License No." class="form-control input-md">     
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Owns Vehicle">Owns Vehicle?</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="Owns Vehicle-0">
                                    <input type="checkbox" name="Owns Vehicle" id="Owns Vehicle-0" value="1">
                                    4 wheeler
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Owns Vehicle-1">
                                    <input type="checkbox" name="Owns Vehicle" id="Owns Vehicle-1" value="2">
                                    Bike
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Owns Vehicle-2">
                                    <input type="checkbox" name="Owns Vehicle" id="Owns Vehicle-2" value="3">
                                    Bicycle
                                </label>
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Working Experience (time period)">Working Experience (time period)</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>    
                                </div>
                                <input id="Working Experience (time period)" name="Working Experience" type="text" placeholder="Enter time period " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Overview (max 200 words)">Overview (max 200 words)</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" rows="10"  id="Overview (max 200 words)" name="Overview (max 200 words)">Overview</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>  
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a>
                            <a href="#" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Clear</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

        <div>
            <div class="col-md-2 hidden-xs">
            <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
        </div>

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!--End User Profile-->

        
        <!-- Start Bottom Nav -->
        <div class="bottom-nav-group">
            <nav class="bottom-nav">
                <a href="login.php" class="<?php if($page == 'useraccount'){echo 'bottom-nav-active';}?> bottom-nav-link">
                    <i class="fas fa-user bottom-nav-icon" ></i>
                    <span class="bottom-nav-text">Account</span>
                </a>
                <!-- <a href="#" class="bottom-nav-link">
                    <i class="fas fa-search"></i>
                    <span class="bottom-nav-text">Search</span>
                </a> -->
                <a href="#" class="<?php if($page == 'cart'){echo 'bottom-nav-active';}?> bottom-nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="bottom-nav-text">My Cart</span>
                </a> 
            </nav>
        </div>
        <!-- End Bottom Nav -->
    </body>
</html>