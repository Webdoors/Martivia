<?php
if(isset($_SESSION['GuserID'])){
	
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	
	$act=mysqli_query($con,"SELECT * FROM categories ORDER BY position DESC");
	$ract=mysqli_fetch_assoc($act);
	$pos=++$ract['position'];
	
	
	$dd=mysqli_query($con,"INSERT INTO categories (name,position) VALUES ('$a','$pos')");
 
	echo 1;
	
}
?>