<?php
if($_SESSION['GuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	if($e=="date"){
		$c=explode("-",$c);
		$c=strtotime($c[2]."-".$c[1]."-".$c[0]);
	}
	mysqli_query($con,"UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'");
	// echo "UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'";
	echo 1;
}
?>
