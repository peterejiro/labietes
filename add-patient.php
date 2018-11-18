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
                <h2>Diabetes Diagnosis Tool</h2>
                <small class="text-muted">Add New Patient</small>
               <form method="post" action="script">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone_no" placeholder="Phone No." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="datepicker form-control" name="birthdate" placeholder="Date of Birth" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="age" placeholder="Age" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group drop-custum">
                                <select class="form-control show-tick" name="gender" required>
                                    <option value="">-- Gender --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Address" name="address" required></textarea>
                                </div>
                            </div>
                        </div>
                </div>

                        <div class="col-xs-12">
                            <button type="submit" name="addpatient" class="btn btn-raised g-bg-cyan">Submit</button>

                        </div>

                    </div>
                </div>
            </div>
    </form>
        </div>


    </section>


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