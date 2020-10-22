<?php
$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);

$ns1=mysqli_query($con,"SELECT * FROM Incidentally WHERE text='$a'");
if(mysqli_num_rows($ns1)==0)
{
	mysqli_query($con,"INSERT INTO Incidentally (text,engtext,rutext) VALUES ('$a','$b','$c')");
	echo 1;
}


?>