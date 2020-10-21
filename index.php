<?php 
date_default_timezone_set('Asia/Tbilisi');
session_name('atelier_site');
session_start();
mb_internal_encoding("UTF-8");
include("db.php");
if(isset($_COOKIE['kbag'])) {
	$bag=$_COOKIE['kbag'];
}else{
	$bag='';
}
$bag_count=0;
$bag_count=count(explode('-', $bag)); if($bag_count>0) $bag_count--;
if(isset($_COOKIE['kfavorite'])) {
	$favorite=$_COOKIE['kfavorite'];
}else{
	$favorite='';
}
$favorite_count=0;
$favorite_count=count(explode('-', $favorite)); if($favorite_count>0) $favorite_count--;

include("view/inc/header.php");
$page="home";
if(isset($_GET["page"])||isset($_GET["address"])){
	$page=$_GET["page"];
}
if(isset($_GET["address"])){
	$page=$_GET["address"];
}

include("view/pages/".$page.".php");

include("view/inc/footer.php");
mysqli_close($con);
?>