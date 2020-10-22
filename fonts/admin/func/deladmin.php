<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);

	if(!mysqli_query($con,"DELETE FROM admins WHERE id='$a'")){
	    die(mysqli_error());
    }
	echo 1;
}
?>