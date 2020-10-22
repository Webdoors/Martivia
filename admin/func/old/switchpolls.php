<?php
$a=(int)$_POST['a'];
mysqli_query($con,"UPDATE gamokitxvebi SET active=1 WHERE id='$a' ");
mysqli_query($con,"UPDATE gamokitxvebi SET active=0 WHERE id!='$a' ");
echo 1;
?>