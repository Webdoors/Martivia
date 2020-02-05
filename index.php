<?php  
	session_name("apiadmin");
	session_start();
	include("db_open.php");
	date_default_timezone_set("Asia/Tbilisi");
	$uid=$_SESSION['uid'];
	$q1=mysqli_query($con,"SELECT * FROM users WHERE Id='$uid'");
	$dir="pages/";
	if(isset($_SESSION['timeout'])){
		if($_SESSION['timeout']<time()){
			session_unset(); 
			session_destroy(); 
		}		
	}


if(mysqli_num_rows($q1)>0){
	$PG="home";
	if(isset($_GET["page"])){
		$PG=$_GET["page"];
	}
	include("view/inc/head.php");
	include("view/pages/".$PG.".php");
	include("view/inc/foot.php");	
}else{
	include("view/pages/login.php");
}	

include("db_close.php");
?>