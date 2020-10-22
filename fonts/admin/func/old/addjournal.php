<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('max_execution_time',"3660");
$pdf=mysqli_real_escape_string($con,$_POST["pdf"]);
mysqli_query($con,"INSERT INTO journals SET pdf_link='".$pdf."'");
$jid=mysqli_insert_id($con);
$pdf=explode("4seasonsgeorgia.ge",$pdf);
$pdf=end($pdf);
mkdir("../media/journal/".$jid);
// echo getcwd();
try{
	shell_exec("pdftoppm -jpeg ".BASE_PATH.$pdf." ../media/journal/".$jid."/page  ");
}catch(Exception $e) {
	// var_dump($e);
}
// $jid="15";
$files=glob("../media/journal/".$jid."/*.jpg");
foreach($files as $img){
	spliter($img,$jid);
}  
function spliter($img,$jid){
	require_once("imgresizer.php");
	$im = imagecreatefromjpeg($img);
	$imgname=explode("/",$img);
	$imgname=end($imgname);
	if(imagesx($im)>imagesy($im)){
		$size = min(imagesx($im), imagesy($im));
		$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 1302, 'height' => $size]);
		if ($im2 !== FALSE) {
			$new="../media/journal/".$jid."/p-".$imgname;
			$new=str_replace(".","1.",$imgname);
			$new="../media/journal/".$jid."/p-".$new;
			imagejpeg($im2, $new);
			imagedestroy($im2);
		}
		imagedestroy($im);
		$im = imagecreatefromjpeg($img);
		$size = min(imagesx($im), imagesy($im));
		$im2 = imagecrop($im, ['x' => 1302, 'y' => 0, 'width' => 1302, 'height' => $size]);
		if ($im2 !== FALSE) {
			$new=$imgname;
			$new=str_replace(".","2.",$imgname);
			$new="../media/journal/".$jid."/p-".$new;
			imagejpeg($im2,$new);
			imagedestroy($im2);
		}
		imagedestroy($im);
		unlink($img);		
	}else{
		rename($img,"../media/journal/".$jid."/p-".$imgname);
	}
	$image=new SimpleImage();
	$image->load("../media/journal/".$jid."/p-".$imgname);
	$image->resizeToWidth(650);
	$image->save("../media/journal/".$jid."/p-".$imgname);
	// echo $img."<br>";
	// echo "../media/journal/".$jid."/p-".$imgname."<br>";
}
echo 1;
// echo "pdftoppm -jpeg /home/admin/domains/4seasonsgeorgia.ge/public_html".$pdf." page";
// "/home/admin/domains/4seasonsgeorgia.ge/public_html/admin";
// var_dump($_POST);
?>