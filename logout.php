<?php
/**
 * Created by PhpStorm.
 * User: Oki-Peter Ejiroghene
 * Date: 5/12/2018
 * Time: 3:18 PM

 */

session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("location:index");
exit;
?>