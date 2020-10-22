<?php

if(isset($_SESSION['GuserID'])){
	$a=(int)$_POST["a"];
	mysqli_query($con,"DELETE FROM slider WHERE id='$a'");
	echo 1;
}
?>