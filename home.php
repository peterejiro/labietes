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
            <small class="text-muted">Welcome to labites application</small>
            <div class="body">
<form action="script" method="post">
                <div class="col-sm-3">

                    <div class="form-group drop-custum">
                        <select class="form-control show-tick" name="patient_id">
                            <option value="" selected>.......Select Patient........ </option>
                            <?php  $sql = "SELECT * FROM patient";

                            $result = mysqli_query($myConn, $sql);

                            while($row=  mysqli_fetch_array($result, MYSQLI_BOTH))
                            { $id = $row['id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];



                                ?>

                                <option value="<?php echo $id; ?>"><?php echo $first_name."  ".$last_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" min="7" max="15" step="0.005" class="form-control" name="glycine" placeholder="Enter Glycine level">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <button type="submit" class="btn btn-raised g-bg-cyan" name="analyse">Run Analysis </button>

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