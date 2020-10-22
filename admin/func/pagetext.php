<?php

$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);

$pgt=mysqli_query($con,"SELECT * FROM $c ");
if(mysqli_num_rows($pgt)==0)
{
	mysqli_query($con,"INSERT INTO $c SET title='$a' , text='$b' ");
	echo 1;
}
else
{
	mysqli_query($con,"UPDATE  $c SET title='$a' , text='$b' ");
	echo 1;
}

?>