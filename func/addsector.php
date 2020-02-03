<?php
if($_SESSION['MGuserID']!=""){
	$T=time();
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	mysqli_query($con,"INSERT INTO sectors SET name='".$a."',NPL='".$b."' ");
	echo 1;
}
?>