<?php
// ini_set("display_errors",1);
// ini_set("error_reporting",E_ALL);
session_set_cookie_params(["path"=>"/","domain"=>$_SERVER["HTTP_HOST"],"secure"=>true,"httponly"=>true,"samesite"=>"Lax"]);
session_name("easteradmin");
	session_start();
	// var_dump($_SESSION);
	include("../config.php");
	include("../db.php");
	include("func/functions.php");
	$Guid=$_SESSION['GuserID']??"";
	$timeout=$_SESSION['Gtimeout']??"";
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE id='$Guid'");
	$dir="pages/";
if($timeout<time()){
	session_unset();
	session_destroy();
}
if(mysqli_num_rows($q1)>0){

	$Guid=$_SESSION['GuserID'];
	$PG="articles";
	if(isset($_GET["page"])){
		$PG=sanit_data($_GET["page"]);
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
