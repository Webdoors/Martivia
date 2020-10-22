<?php
session_start();
if(isset($_SESSION['GuserID'])){
$a = mysqli_real_escape_string($con, $_POST['a']);
$b = mysqli_real_escape_string($con, $_POST['b']);
$c = mysqli_real_escape_string($con, $_POST['c']);
$d = mysqli_real_escape_string($con, $_POST['d']);
$e = mysqli_real_escape_string($con, $_POST['e']);





if($e=='')
{
	mysqli_query($con,"UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'");
}	

else
{
	$tbl=mysqli_query($con, "SELECT * FROM langs WHERE  table_name='$a' AND table_id='$d' AND table_column='$b' AND short_name='$e' ");
	if(mysqli_num_rows($tbl)==0)
	{
		if($e=='ru')
		{
			$lng='russian';
		}
		if($e=='en')
		{
			$lng='english';
		}
		mysqli_query($con,"INSERT INTO langs SET  table_id='$d', table_name='$a', table_column='$b' , short_name='$e', name='$lng' ");
	}
	else
	{
	mysqli_query($con,"UPDATE langs SET  column_value='$c' WHERE table_id='$d' AND table_name='$a' AND table_column='$b' AND short_name='$e' ");
	}
	}
	
	echo 1;
}
?>
