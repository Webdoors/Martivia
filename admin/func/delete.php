<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	mysqli_query($con,"DELETE FROM `$a` WHERE id='$b'");
	echo 1;
}
?>