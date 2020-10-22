<?php
$a=(int)$_POST['a'];

$rc=mysqli_query($con,"SELECT * FROM videos");
if(mysqli_num_rows($rc)==0)
{
	mysqli_query($con,"INSERT INTO videos (active) VALUES ('".$a."')");
	echo 1;
}
else
{
	mysqli_query($con,"UPDATE videos SET active='$a'");
	echo 2;
}
?>