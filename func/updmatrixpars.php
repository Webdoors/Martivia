<?php

if($_SESSION['MGuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$q1=mysqli_query($con,"SELECT id FROM matrixpars WHERE merchantid='".$c."'");
	if(mysqli_num_rows($q1)<1){
		mysqli_query($con,"INSERT INTO matrixpars SET merchantid='".$c."'");
	}
	mysqli_query($con,"UPDATE matrixpars SET ".$b."='".$a."' WHERE merchantid='".$c."'");
	echo 1;
}

?>