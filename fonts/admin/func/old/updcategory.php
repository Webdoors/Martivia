<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=(int)$_POST["b"];
	$c=(int)$_POST["c"];
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	mysqli_query($con,"UPDATE categories SET name='".$a."', pid='".$b."', engname='".$d."', runame='".$e."'  WHERE id='".$c."'");
	echo 1;
	echo $d;
}
?>