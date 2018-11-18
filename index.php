<?php
session_start();
include("connection.php");
//error_reporting(0);

if(isset($_SESSION['labattendant'])) {

    header("location:home");
}
else{
    header("location:sign-in");

}
?>