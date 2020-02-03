<?php

if($_SESSION['MGuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	mysqli_query($con,"DELETE FROM merchants WHERE id='".$a."'");
	echo 1;
}

?>