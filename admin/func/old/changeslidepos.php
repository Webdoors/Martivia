<?php
$a=(int)$_POST['a'];
$b=(int)$_POST['b'];
$ps=mysqli_query($con, "SELECT * FROM slider WHERE id='$a'");
$rps=mysqli_fetch_assoc($ps);
$pos=$rps['position'];
mysqli_query($con,"UPDATE slider SET position='$b' WHERE id='$a' ");


$ps1=mysqli_query($con, "SELECT * FROM slider WHERE position='$b' AND id!='$a' ");
if(mysqli_num_rows($ps1)>0)
{
	$rps1=mysqli_fetch_assoc($ps1);
   mysqli_query($con,"UPDATE slider SET position='$pos' WHERE id='".$rps1['id']."' ");
   echo 1;
}



?>