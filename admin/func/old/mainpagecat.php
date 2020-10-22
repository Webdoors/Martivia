<?php
if(isset($_SESSION['GuserID'])){
	$k=mysqli_real_escape_string($con,$_POST["a"]);
	$serviceid=mysqli_real_escape_string($con,$_POST["b"]);
		mysqli_query($con,"UPDATE categories SET main='".$k."' WHERE id='".$serviceid."' ");
	echo 1;
}
?>