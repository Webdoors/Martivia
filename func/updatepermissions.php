<?php

if($_SESSION['MGuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	mysqli_query($con,"UPDATE `permissions` SET `".$a."`='".$c."' WHERE `adminid`='".$b."'");
	echo 1;
}

?>