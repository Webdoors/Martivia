<?php
$a=(int)$_POST['a'];

$rc=mysqli_query($con,"SELECT * FROM rightarticle");
if(mysqli_num_rows($rc)==0)
{
	mysqli_query($con,"INSERT INTO rightarticle (pid) VALUES ('".$a."')");
}
else
{
	mysqli_query($con,"UPDATE rightarticle SET pid='$a'");
}
?>