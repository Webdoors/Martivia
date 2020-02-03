<?php
	session_name("apiadmin");
session_start();
	$con = mysqli_connect("","","","");
	mysqli_set_charset($con,"utf8");
	date_default_timezone_set("Asia/Tbilisi");
	$f=mysqli_real_escape_string($con,$_REQUEST["fname"]).".php";
	include($f);
	mysqli_close($con);
?>