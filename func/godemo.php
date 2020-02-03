<?php

if($_SESSION['MGuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	mysqli_query($con,"UPDATE merchants SET demo='".$b."' WHERE id='".$a."'");
	echo 1;
}

?>