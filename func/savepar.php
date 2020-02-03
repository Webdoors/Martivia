<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	if($a!="GDP"&&$a!="NPL"&&$a!="SNPL"){
		mysqli_query($con,"UPDATE plugins SET value='".$b."' WHERE name='".$a."' ");	
	}
	if($a=="GDP"||$a=="NPL"){
		mysqli_query($con,"UPDATE plugins SET `M".$c."`='".$b."',average='".$d."' WHERE name='".$a."' ");		
	}
	if($a=="SNPL"){
		mysqli_query($con,"UPDATE sectors SET NPL='".$b."' WHERE Id='".$d."' ");
	}
	
	echo 1;
}
?>