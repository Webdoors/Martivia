<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$p1=$d;
	$pass=$p1;
	$salt=dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
	$pass=hash('sha256', $pass . $salt);
	mysqli_query($con,"INSERT INTO admins SET name='$a',lastname='$b',user='$c',pass='$pass',salt='$salt',tel='".$e."'");
	echo 1;
}
?>