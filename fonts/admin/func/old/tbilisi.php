<?php

if(isset($_SESSION['GuserID'])){

	$a=(int)$_POST["a"];

	$b=(int)$_POST["b"];

		mysqli_query($con,"UPDATE articles SET tbilisi='".$a."' WHERE id='".$b."' ");

	echo 1;

}

?>