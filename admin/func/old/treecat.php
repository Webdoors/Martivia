<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	mysqli_query($con,"UPDATE treecat SET tree='$a'");
	echo 1;
}
?>