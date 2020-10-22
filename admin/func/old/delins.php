<?php
$a=(int)$_POST['a'];
mysqli_query($con,"DELETE FROM Incidentally WHERE id='$a' ");
echo 1;


?>