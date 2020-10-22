<?php

if(isset($_SESSION['GuserID'])){

	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$g=mysqli_real_escape_string($con,$_POST["g"]);
	$f=mysqli_real_escape_string($con,$_POST["f"]);
	$h=mysqli_real_escape_string($con,$_POST["h"]);

	$pos=1;
	
    mysqli_query($con,"INSERT INTO  slider SET name='".$a."',description='".$b."',image='".$c."',url='".$d."' ");

		echo 1;
	

	
	
}

?>