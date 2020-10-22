<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
//	$e=mysqli_real_escape_string($con,$_POST["e"]);
//	$p1=$d;
	$pass=$d;
	//$salt=dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
	$pass=hash('sha256', $pass);
	
	if($a!=''&&$b!=''&&$c!=''&&$d!='')
	{
	$adm=mysqli_query($con,"SELECT * FROM admins WHERE user='$c' ");
	if(mysqli_num_rows($adm)==0)
	{
	mysqli_query($con,"INSERT INTO admins SET name='$a',lastname='$b',user='$c',pass='$pass'");
	echo 1;
	}
	else
	{
		echo "ასეთი მომხმარებელი უკვე არსებობს!";
	}
	}
	else
	{
		echo "გთხოვთ შეავსეთ ველები!";
	}
}
?>