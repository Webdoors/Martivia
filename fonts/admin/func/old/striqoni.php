<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
$c=mysqli_real_escape_string($con,$_POST["c"]);
echo $_POST['a'] .'-'. $a;
$strr=mysqli_query($con,"SELECT * FROM striqoni");
if(mysqli_num_rows($strr)==0)
{
	mysqli_query($con,"INSERT INTO striqoni (text,engtext,rutext) VALUES ('$a','$b','$c')");
	echo 1;
}
else
{
	mysqli_query($con,"UPDATE striqoni SET text='$a', engtext='$b', rutext='$c' ");
	echo 1;
}

?>