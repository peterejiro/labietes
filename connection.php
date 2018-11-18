<?php
/**
 * Created by PhpStorm.
 * User: rOKz
 * Date: 7/30/2018
 * Time: 5:31 PM
 */


	$dbUsername="root";
	$psswd = "";
	$dbName = "labites";
	$hostName = "localhost";
	$myConn = mysqli_connect($hostName,$dbUsername,$psswd,$dbName);
	if(!$myConn){
        die("Could not connect at the moment because ". mysqli_connect_error());
    }
?>