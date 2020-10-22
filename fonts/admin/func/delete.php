<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=(int)$_POST["b"];
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	mysqli_query($con,"DELETE FROM `$a` WHERE id='$b'");
	
	mysqli_query($con,"DELETE FROM  seo WHERE page_name='$c' AND table_id='$b'");
	echo 1;
}
?>