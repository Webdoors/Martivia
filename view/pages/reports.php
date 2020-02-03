<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$ACP=1;
	if($_REQUEST["p"]>0){
		$ACP=$_REQUEST["p"];
	}
	$fr=($ACP-1)*30;
	
?>
<?php
if($r12["reports"]==1){
?>
<div class="container-fluid">
	<div class="col-sm-6 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 col-md-2">
		<br>
		<a type="button" href="?page=reports&id=1" class="btn <?=$_GET["id"]==1||$_GET["id"]==""?"btn-primary":"btn-default"?> btn-block mb10">Score-History</a>
		<a type="button" href="?page=reports&id=2" class="btn <?=$_GET["id"]==2?"btn-primary":"btn-default"?> btn-block mb10">Test scores</a>
		<a type="button" href="?page=reports&id=3" class="btn <?=$_GET["id"]==3?"btn-primary":"btn-default"?> btn-block mb10">Lightspeed</a>
	</div>
	<div class="col-sm-6 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 col-md-10">
	<br>
<?php 
if($_GET["id"]==1||$_GET["id"]==""){
	include "reports/score-history.php";
}elseif($_GET["id"]==2){
	include "reports/testing.php";	
}elseif($_GET["id"]==3){
	include "reports/lightspeed.php";	
}
?>
	</div>
</div>
<?php
}
?>
<?php
}
?>