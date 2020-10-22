<?php
$a=(int)$_POST['a'];
$b=(int)$_POST['b'];
mysqli_query($con,"UPDATE slider SET active='$a' WHERE id='$b'");
echo 1;
?>