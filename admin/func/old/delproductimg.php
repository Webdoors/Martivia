<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	mysqli_query($con,"DELETE FROM productimgs WHERE Id='$a'");
	echo 1;
}
?>