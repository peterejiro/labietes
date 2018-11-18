
<?php
//error_reporting(0);

if(isset($_POST['login'])){
    session_start();
    include ("connection.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM lab_attendant WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($myConn, $sql);
    $row=  mysqli_fetch_array($result, MYSQLI_BOTH);
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];

    $rows = mysqli_num_rows($result);

    if ($rows == 1){

        $_SESSION['labattendant'] = $username;
        $username = $_SESSION['labattendant'];

        ?>

       <script type="text/javascript">
            function myFunctions1(){

                window.location = "home";
            }
            setTimeout(myFunctions1, 6000)

        </script>




        <?php

    }
    else{?>

               <script type="text/javascript">
            function myFunctions2(){
                alert("Invalid user id or Password");


                window.location = "home";
            }
            setTimeout(myFunctions2, 6000)

        </script>


    <?php }

}


?>

<?php
if(isset($_POST['addpatient'])) {
    include ("connection.php");

    $first_name = mysqli_escape_string($myConn, $_POST['first_name']);
    $last_name = mysqli_escape_string($myConn, $_POST['last_name']);
    $email = mysqli_escape_string($myConn, $_POST['email']);
    $phone = mysqli_escape_string($myConn, $_POST['phone_no']);
    $address = mysqli_escape_string($myConn, $_POST['address']);
    $birthdate = mysqli_escape_string($myConn, $_POST['birthdate']);
    $age = mysqli_escape_string($myConn, $_POST['age']);
    $address = mysqli_escape_string($myConn, $_POST['address']);
    $gender = mysqli_escape_string($myConn, $_POST['gender']);


    $query_code = "SELECT * FROM patient WHERE first_name ='{$first_name}' and last_name = '{$last_name}' ";
    $result_login = mysqli_query($myConn, $query_code);
    $anything_found = mysqli_num_rows($result_login);

    if ($anything_found > 0) { ?>
        <script type="text/javascript">
            alert("Patient Already Exists");
            window.location = "add-patient";
        </script>

        <?php
        die();
        ?>
    <?php }
    else {

        $add = "INSERT INTO patient (first_name, last_name, email, phone_number, birthdate, age, gender, address)
										 VALUES('$first_name', '$last_name', '$email', '$phone', '$birthdate', '$age', '$gender', '$address')";

        if ($myConn->query($add) === TRUE) { ?>

            <script type="text/javascript">
                alert("New patient added Successfully");
                window.location = "add-patient";
            </script>
        <?php } else {
            echo "Error: " . $add . "<br>" . $myConn->error;
        }
    }
}

?>
<?php
if(isset($_POST['analyse'])) {
    include("connection.php");

    $patient_id = mysqli_escape_string($myConn, $_POST['patient_id']);
    $glycine = mysqli_escape_string($myConn, $_POST['glycine']);


    $sql = "SELECT * FROM patient WHERE id ='{$patient_id}' ";

    $result = mysqli_query($myConn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $age = $row['age'];

    if ($age > 17 && $glycine > 7.0 && $glycine && 9.26) {
        $test_result = "Type 2 Diabetes";
    }
    if ($age < 17 && $age == 17 && $glycine > 7.0 && $glycine < 9.26) {
        $test_result = "Type 1 Diabetes";
    }

    if ($age > 17 && $glycine > 9.26) {
        $test_result = "Acute Type 2 Diabetes";
    }
    if ($age < 17 && $age == 17 && $glycine > 9.26) {
        $test_result = "Acute Type 1 Diabetes";
    }

    $add = "INSERT INTO test (glycine, test_result, patient_id, date)
										 VALUES('$glycine', '$test_result', '$patient_id', now())";

    if ($myConn->query($add) === TRUE) { ?>

        <script type="text/javascript">
            alert("Analysis Complete");
            window.location = "test-report";
        </script>
    <?php }
    else {
        echo "Error: " . $add . "<br>" . $myConn->error;


}}

?>

<?php


if(isset($_POST['transferdirect'])) {
    session_start();
    include("connection.php");
    $user_id = $_SESSION['userid'];
    $account_number = $_POST['account_number'];
    $real_account_number = $_POST['real_account_number'];
    $amount = $_POST['amount'];

    $get_beneficiary = "SELECT * FROM beneficiary WHERE user_id = '$user_id' and account_number = '$account_number'";
    $true = mysqli_query($myConn, $get_beneficiary);
    $rows = mysqli_fetch_array($true, MYSQLI_BOTH);
    $account_name = $rows['account_name'];





    $sql = "SELECT * FROM customer WHERE user_id = '$user_id'";

    $result = mysqli_query($myConn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $account_balance = $row['account_balance'];
    $account_status = $row['account_status'];
    $rows = mysqli_num_rows($result);




    $new_balance = $account_balance - $amount;

    if (($amount == null)  || ($account_number == null)) { ?>


        <div id="loading-overlay">
            <div class="loader">..Processing..</div>
        </div>




        <script type="text/javascript">
            function myFunctions1(){
                alert("Transaction Error: Please Enter Valid Details");
                window.location = "account";
            }
            setTimeout(myFunctions1, 5000)

        </script>

        <?php die(); }

    if ($new_balance < 1) { ?>

        <div id="loading-overlay">
            <div class="loader">..Processing..</div>
        </div>




        <script type="text/javascript">
            function myFunctions2(){
                alert("Insufficient Balance");
                window.location = "account";
            }
            setTimeout(myFunctions2, 5000)

        </script>

        <?php die(); }

    if (($account_status == 2)|| ($account_status == 3)){
        ?>

        <div id="loading-overlay">
            <div class="loader">..Processing..</div>
        </div>




        <script type="text/javascript">
            function myFunctions(){
                alert("Transaction  Unsuccessful, please Contact Your bank");
                window.location = "account";
            }
            setTimeout(myFunctions, 5000)

        </script>

        <?php die(); } else {
        $update = "UPDATE customer SET account_balance = '$new_balance' WHERE customer.user_id = '$user_id'";
        if ($myConn->query($update) === TRUE) { ?>




            <div id="loading-overlay">
                <div class="loader"> ..Processing..</div>
            </div>




            <script type="text/javascript">
                function myFunction(){
                    alert("Transaction successful");
                    window.location = "account";
                }
                setTimeout(myFunction, 5000)

            </script>

            <?php $add = "INSERT INTO history (user_id, amount, account_number, account_name, transaction_type, date)
										 VALUES('$user_id', '$amount', '$account_number', '$account_name', '0', now())";
            $result = mysqli_query($myConn, $add);




        }

    }

}
?>

<?php


if(isset($_POST['adminlogin'])){
    session_start();
    include ("connection.php");
    $admin = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$admin' AND password = '$password'";

    $result = mysqli_query($myConn, $sql);
    $row=  mysqli_fetch_array($result, MYSQLI_BOTH);
    $admin_username = $row['username'];
    $rows = mysqli_num_rows($result);

    if ($rows == 1){

        $_SESSION['admin'] = $admin_username;
        $admin_username = $_SESSION['admin'];
        ?>
        <script type="text/javascript">


            window.location = "administrator";
        </script>

        <?php



    }
    else{?>   <script type="text/javascript">

        alert("Invalid user id or Password");
        window.location = "admin";
    </script>

        <?php die(); }

}


?>

<?php

if (isset($_POST['contact'])) {
    $address = "info@alisterbank.com";
    if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

    $error = false;
    $fields = array('name', 'email', 'message', 'url');

    foreach ($fields as $field) {
        if (empty($_POST[$field]) || trim($_POST[$field]) == '')
            $error = true;
    }

    if (!$error) {

        $name = stripslashes($_POST['name']);
        $email = trim($_POST['email']);
        $message = stripslashes($_POST['message']);
        $url = stripslashes($_POST['url']);

        $e_subject = 'You\'ve been contacted by ' . $name . '.';


        // Configuration option.
        // You can change this if you feel that you need to.
        // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

        $e_body = "You have been contacted by: $name" . PHP_EOL . PHP_EOL;
        $e_reply = "E-mail: $email" . PHP_EOL . PHP_EOL;
        $e_content = "Message:\r\n$message" . PHP_EOL . PHP_EOL;
        $e_url = "\r\nWebsite: $url" . PHP_EOL . PHP_EOL;

        $msg = wordwrap($e_body . $e_reply, 70);

        $headers = "From: $email" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "Website: $url" . PHP_EOL;
        $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

        if (mail($address, $msg, $headers, $e_content)) {

            // Email has sent successfully, echo a success page.

            echo 'Success';

        } else {

            echo 'ERROR!';

        }

    }
}
?>
<script src="javascript/jquery.min.js"></script>

<script src="javascript/tether.min.js"></script>
<script src="javascript/bootstrap.min.js"></script>
<script src="javascript/jquery.easing.js"></script>
<script src="javascript/jquery-waypoints.js"></script>
<script src="javascript/jquery-validate.js"></script>
<script src="javascript/jquery.cookie.js"></script>
<script src="javascript/parallax.js"></script>
<script src="javascript/gmap3.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwK1Hd3iMGyF6ffJSRK7I_STNEXxPdcQ&region=GB"></script>


<script src="javascript/main.js"></script>
