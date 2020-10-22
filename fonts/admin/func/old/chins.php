<?php
$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);
$d=(int)$_POST['d'];
mysqli_query($con,"UPDATE Incidentally SET text='$a', engtext='$b', rutext='$c' WHERE id='$d' ");
echo 1;

?>