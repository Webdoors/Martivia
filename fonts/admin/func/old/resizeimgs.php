<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	 require_once("imgresizer.php");
$jid=mysqli_real_escape_string($con,$_POST["jid"]);
$files=glob("../media/journal/".$jid."/*.png");
$i=0;
foreach($files as $img){
	$i++;
	if($i<2){
		$image=new SimpleImage();
		$image->load($img);
		$image->resizeToWidth(700);
		$image->save($img);
		echo $img."<br>";		
	}

}  
?>