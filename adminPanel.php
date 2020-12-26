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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['sendMail'])){
            if(!empty($_POST['message'])) {

                $message = test_input($_POST['message']);
                
                $sql = "SELECT email FROM user WHERE isSubscribed = 1";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0)
                {
                    $emailArray = Array();

                    while ($row =  mysqli_fetch_assoc($result)) {
                        $emailArray[] =  $row['email'];
                    }

                    $to = "malako.cakeshop@gmail.com";
                    if(isset($_POST['subject']))
                    {
                        $subject = test_input($_POST['subject']);
                    }
                    $msg = $message;
                    $headers = "From: malako.cakeshop@gmail.com \r\n";
                    $headers .= "Bcc: " . implode(",", $emailArray) . "\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    mail($to, $subject, $msg, $headers);
                    // Used to prevent the mail from sending each time the page is refreshed
                    header("location: $_SERVER[PHP_SELF]");
                }
            }
        }
    }
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
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->

        
        <!-- Start Header -->
        <div id="screenRes" class="col-md-15">
            <div class="form-name-container">
                <div class="adminPanelContainer">
                    <div class="adminPanelSubtitle">
                        <h2>ADMIN PANEL</h2>
                    </div>
                </div>
                
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
                <li><a data-toggle="pill" href="#sendMail">Send Mail</a></li>
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
                
                        
                <div id="sendMail" class="tab-pane fade">
                    <div class="tab-title">
                        <h3>Send Mail To Subscribers</h3>
                    </div>
                    <div class="container mt-5 mb-5">
                        <form method="POST" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            <div class="sendMailBtnContainer">
                                <button name="sendMail" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> Send Mail</button>
                            </div>
                            <br>
                            <label>Subject:</label>
                            <input class="form-control input-md" name="subject" type="text" placeholder="Enter mail subject" required>
                            <br>
                            
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
                                    ['media', ['link', 'table', 'hr']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['height', ['height', 'codeview', 'fullscreen', 'undo', 'redo']]
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- End Tab -->
    </body>
</html>