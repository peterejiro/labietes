<?php

session_start();
include ("connection.php");
if(isset($_SESSION['labattendant'])){
    $username = $_SESSION['labattendant'];
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>:: labites - Diabetes Diagnosis ::</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="assets/css/main.css" rel="stylesheet">
        <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- #Float icon -->

    <!-- #Float icon -->
    <!-- Morphing Search  -->

    <!-- Top Bar -->

    <!-- #Top Bar -->
    <?php include('header.php'); ?>

    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All Patients</h2>
                <small class="text-muted">Welcome to Labites</small>
            </div>
            <div class="row clearfix">
    <?php
    $SQL = "SELECT * FROM patient";

    $result = mysqli_query($myConn,$SQL);
    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)){


        $user_id = $row["id"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $address = $row["address"];
        $email = $row["email"];
        $birthdate = $row["birthdate"];
        $age = $row["age"];
        $phone_no = $row["phone_number"];
        $gender = $row["gender"];

        ?>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card all-patients">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center m-b-0">
                                    <a href="#" class="p-profile-pix"><img src="assets/images/patients/random-avatar3.jpg" alt="user" class="img-thumbnail img-fluid"></a>
                                </div>
                                <div class="col-md-8 col-sm-8 m-b-0">
                                    <h5 class="m-b-0"> <?php echo $first_name."  ".$last_name; ?> </h5>
                                    <address class="m-b-0">
                                        <?php echo $address;?> <br>
                                        <abbr title="Phone">P:</abbr> <?php echo $phone_no; ?><br>
                                        <abbr title="E-Mail">Email:</abbr> <?php echo $email; ?><br>
                                        <abbr title="E-Mail">Birth Date:</abbr> <?php echo $birthdate; ?><br>
                                        <abbr title="E-Mail">Age:</abbr> <?php echo $age; ?><br>
                                        <abbr title="E-Mail">Gender:</abbr> <?php if($gender == 1){echo "male";}
                                        else {
                                            echo "female";
                                        }; ?><br>
                                        <abbr title="E-Mail">Email:</abbr> <?php echo $email; ?><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php }?>
            </div>
        </div>
    </section>

    <div class="color-bg"></div>
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
    <script src="assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js -->

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="assets/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js -->
    <script src="assets/js/pages/index.js"></script>
    <script src="assets/js/pages/charts/sparkline.min.js"></script>
    </body>
    </html>
<?php }
else{
    header("location:sign-in");
}
?>