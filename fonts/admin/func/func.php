<?php
session_name("easteradmin");
session_start();
	require_once("../../config.php");
	require_once("../../db.php");
	require_once("functions.php");
	$f=mysqli_real_escape_string($con,$_REQUEST["fname"]).".php";
	include($f);	
//echo $f;
	mysqli_close($con); 
?>