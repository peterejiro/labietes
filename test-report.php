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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Patients Test Report </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Test Remark</th>
                                    <th> Date </th>
                                    <th>View</th>

                                </tr>
                                </thead>
                                <tbody>
                              <?php   $SQL = "SELECT * FROM test order by date desc";

    $result = mysqli_query($myConn,$SQL);
    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)){


        $id = $row["id"];
        $test_result = $row["test_result"];
        $date = $row["date"];

        $getpatient = "SELECT * FROM patient where id = $id";
        $results = mysqli_query($myConn, $getpatient);
        $rows = mysqli_fetch_array($results,MYSQLI_BOTH);
        $first_name = $rows["first_name"];
        $last_name = $rows["last_name"];


        ?>

        <tr>
                                    <td><?php echo $first_name; ?></td>
                                    <td><?php echo $last_name; ?></td>
                                    <td><?php echo $test_result; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><a href="patient-report.php?id=<?php echo $id; ?>" class="btn btn-raised g-bg-red"> View Report</a> </td>
                                </tr>
                               <?php } ?>
                                </tbody>
                            </table>
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