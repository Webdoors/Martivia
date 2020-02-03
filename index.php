<?php  
	session_name("apiadmin");
	session_start();
	$con = mysqli_connect("","","","");
	mysqli_set_charset($con,"utf8");
	date_default_timezone_set("Asia/Tbilisi");
	$Guid=$_SESSION['MGuserID'];
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE Id='$Guid'");
	$dir="pages/";
	if(isset($_SESSION['MGtimeout'])){
		if($_SESSION['MGtimeout']<time()){
			session_unset(); 
			session_destroy(); 
		}		
	}


if(mysqli_num_rows($q1)>0){
	

	$Guid=$_SESSION['MGuserID'];
	$q12=mysqli_query($con,"SELECT * FROM permissions WHERE adminid='$Guid'");
	$r12=mysqli_fetch_array($q12);
	$PG="reports";
	if(isset($_GET["page"])){
		$PG=$_GET["page"];
	}
	include("view/inc/head.php");
	include("view/pages/".$PG.".php");
	include("view/inc/foot.php");	
}else{
	include("view/pages/login.php");
}	

mysqli_close($con);
?>