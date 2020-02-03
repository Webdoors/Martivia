<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	mysqli_query($con,"INSERT INTO sectors SET name='".$a."',factor='".$b."',NPL='".$c."'");
	echo 1;
}
?>