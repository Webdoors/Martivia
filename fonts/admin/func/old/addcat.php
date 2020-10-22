<?php
if(isset($_SESSION['GuserID'])){
	
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=(int)$_POST["b"];
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$act=mysqli_query($con,"SELECT * FROM categories ORDER BY position DESC");
	$ract=mysqli_fetch_assoc($act);
	$pos=++$ract['position'];
	$act1=mysqli_query($con,"SELECT * FROM categories ORDER BY mainposition DESC");
	$ract1=mysqli_fetch_assoc($act1);
	$pos1=++$ract1['mainposition'];
	
	$dd=mysqli_query($con,"INSERT INTO categories (name,pid,img,engname,keywords,description,position,mainposition,runame) VALUES ('$a','$b','$c','$d','','','$pos','$pos1','$e')");
 
	echo 1;
	echo $d;
	echo $b;
}
?>