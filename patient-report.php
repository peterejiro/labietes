<?php

session_start();
include ("connection.php");
if(isset($_SESSION['labattendant'])){
    $username = $_SESSION['labattendant'];
    $test_id = $_GET['id'];
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

    <section class="content profile-page">

       <?php $SQL = "SELECT * FROM test order by date desc";

        $result = mysqli_query($myConn,$SQL);
        $row =  mysqli_fetch_array($result, MYSQLI_BOTH);


        $id = $row["id"];
        $date = $row["date"];
        $test_result = $row["test_result"];
        $glycine = $row["glycine"];


        $getpatient = "SELECT * FROM patient where id = $id";
        $results = mysqli_query($myConn, $getpatient);
        $rows = mysqli_fetch_array($results,MYSQLI_BOTH);
        $first_name = $rows["first_name"];
        $last_name = $rows["last_name"];
       $address = $rows["address"];
       $email = $rows["email"];
       $birthdate = $rows["birthdate"];
       $age = $rows["age"];
       $phone_no = $rows["phone_number"];
       $gender = $rows["gender"];

        ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2>Patient Test Results</h2>

            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                   <!-- <div class=" card patient-profile">
                        <img src="assets/images/image-1.jpg" class="img-fluid" alt="">
                    </div> -->
                    <div class="card">
                        <div class="header">
                            <h2>About Patient</h2>
                        </div>
                        <div class="body">
                            <strong>Name</strong>
                            <p><?php echo $first_name."  ".$last_name; ?></p>

                            <strong>Email:</strong>
                            <p><?php echo $email; ?></p>

                            <strong>Phone:</strong>
                            <p><?php echo $phone_no; ?></p>

                            <strong>Date of birth </strong>
                            <p><?php echo $birthdate; ?></p>

                            <strong>Age</strong>
                            <p><?php echo $age; ?></p>

                            <strong>Gender</strong>
                            <p><?php if($gender == 1){echo "Male";}
                            else {
                                echo "Female";
                            }
                                ?></p>
                            <hr>
                            <strong>Address</strong>
                            <address><?php echo $address; ?></address>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="report">
                                    <div class="wrap-reset">
                                        <div class="mypost-list">

                                            <hr>
                                            <div class="post-box">
                                                <h4>General Report</h4>
                                                <div class="body p-l-0 p-r-0">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <div>Glycine Level:</div>
                                                            <div class="m-b-20">
                                                                <p> <?php echo $glycine; ?></p>
                                                                    </div>
                                                        </li>
                                                        <li>
                                                            <div>Final Diagnosis:</div>
                                                            <div class="m-b-20">
                                                                <p> <?php echo $test_result; ?></p>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>

                                            <hr>
                                            <div class="hidden-print col-md-12 text-right">
                                                <a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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