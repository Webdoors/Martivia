<?php

	date_default_timezone_set("Asia/Tbilisi");
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	//$qsalt=mysqli_query($con,"SELECT salt FROM admins WHERE user='$a'");
	//$rs=mysqli_fetch_array($qsalt);
	$pass=hash('sha256', $b);
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE user='$a' AND pass='$pass'");
	 // echo "SELECT * FROM admins WHERE user='$a' AND pass='$pass'";
	$r1=mysqli_fetch_array($q1);
if(mysqli_num_rows($q1)>0){
	$_SESSION['GuserID']=$r1["id"];
	$_SESSION['Gtimeout']=time()+60*60*24;
	echo 1;
}else{
    echo 2;
}
	// var_dump($_SESSION);
?>