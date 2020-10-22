<?php
$a=(int)$_POST['a'];
echo $a;
mysqli_query($con,"DELETE FROM gamokitxvebi WHERE id='$a' ");
mysqli_query($con,"DELETE FROM rating WHERE pid='$a' ");
echo 1;

?>