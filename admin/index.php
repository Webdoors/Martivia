<?php  
	session_start();
	include("../db_open.php");
	$Guid=$_SESSION['GuserID']; 
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE Id='$Guid'");
	$dir="pages/";
if($_SESSION['Gtimeout']<time()){
	session_unset(); 
	session_destroy(); 
}
if(mysqli_num_rows($q1)>0){

	$Guid=$_SESSION['GuserID'];
	$PG="home";
	if(isset($_GET["page"])){
		$PG=$_GET["page"];
	}
	include("view/inc/head.php");
	include("view/pages/".$PG.".php");
	
?>
<?php
	include("view/inc/foot.php");	
}else{
include("view/pages/Glogin.php");
}
mysqli_close($con);
?>