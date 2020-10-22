<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	mysqli_query($con,"UPDATE join_us SET ".$c."='".$a."' WHERE id='".$b."'");
	// echo "UPDATE join_us SET ".$c."='".$a."' WHERE id='".$b."'";
	echo 1;
}
?>
