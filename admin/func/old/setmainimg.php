<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
		mysqli_query($con,"UPDATE productimgs SET main=0 WHERE productid='".$b."' ");
	mysqli_query($con,"UPDATE productimgs SET main=1 WHERE id='".$a."' ");
	echo 1;
}
?>