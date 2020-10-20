<?php
session_start();
session_name("kikalastudioadmin");
	include("../../db.php");	
	$f=mysqli_real_escape_string($con,$_REQUEST["fname"]).".php";
	include($f);	
	mysqli_close($con); 
?>