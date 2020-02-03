<?php  
	session_start();
	date_default_timezone_set("Asia/Tbilisi");
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$qsalt=mysqli_query($con,"SELECT salt FROM admins WHERE user='$a'");
	$rs=mysqli_fetch_array($qsalt);
	$pass=hash('sha256', $b . $rs["salt"]);
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE user='$a' AND pass='$pass'");
	$r1=mysqli_fetch_array($q1);
	$q2=mysqli_query($con,"SELECT * FROM adminsms WHERE adminid='".$r1["Id"]."' ORDER BY id DESC LIMIT 1");
	$r2=mysqli_fetch_array($q2);
	$dif=time()-$r2["date"];
if(mysqli_num_rows($q1)>0&&$r2["code"]===$c&&$dif<=300){
	$_SESSION['MGuserID']=$r1["Id"];
	$_SESSION['MGtimeout']=time()+60*60*12;
	echo 1;
}else{
	echo 2; 
}
?>