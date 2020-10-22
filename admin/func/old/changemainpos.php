<?php
$a=(int)$_POST['a'];
$b=(int)$_POST['b'];
echo $a;
$ps=mysqli_query($con, "SELECT * FROM categories WHERE id='$a'");
$rps=mysqli_fetch_assoc($ps);
$pos=$rps['mainposition'];
mysqli_query($con,"UPDATE categories SET mainposition='$b' WHERE id='$a' ");


$ps1=mysqli_query($con, "SELECT * FROM categories WHERE mainposition='$b' AND id!='$a' ");
if(mysqli_num_rows($ps1)>0)
{
	$rps1=mysqli_fetch_assoc($ps1);
   mysqli_query($con,"UPDATE categories SET mainposition='$pos' WHERE id='".$rps1['id']."' ");
   echo 1;
}


?>