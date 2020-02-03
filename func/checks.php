<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$uid=$_SESSION['MGuserID'];
	$T=time();
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE Id='".$uid."'");
	$r1=mysqli_fetch_array($q1);
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	mysqli_query($con,"UPDATE checks SET ".$b."='".$a."',userid='".$uid."',user='".$r1["name"]." ".$r1["lastname"]."',manualdate='".$T."' WHERE id='".$c."'");
		
	
	echo 1;
}
?>