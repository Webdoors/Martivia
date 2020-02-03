<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	mysqli_query($con,"DELETE FROM sectors WHERE Id='".$a."' ");	
	echo 1;
}
?>