<?php
session_start();
	include("config.php");
	include("db_open.php");
	mysqli_set_charset($con,"utf8");
	date_default_timezone_set("Asia/Tbilisi");
	$f=mysqli_real_escape_string($con,$_REQUEST["fname"]).".php";
	include($f);
	include("db_close.php");
?>
