<?php
$a=(int)$_POST['a'];
$bnr=mysqli_query($con,"SELECT * FROM topbanner");
$rbnr=mysqli_fetch_assoc($bnr);


mysqli_query($con,"DELETE FROM topbanner");

unlink("../../img/banners/".$rtb['img']);
echo 1;
?>