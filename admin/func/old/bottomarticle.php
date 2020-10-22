<?php
$a=(int)$_POST['a'];

$rc=mysqli_query($con,"SELECT * FROM bottomarticle");
if(mysqli_num_rows($rc)==0)
{
	mysqli_query($con,"INSERT INTO bottomarticle (pid) VALUES ('".$a."')");
	echo 1;
}
else
{
	mysqli_query($con,"UPDATE bottomarticle SET pid='$a'");
	echo 1;
}

?>