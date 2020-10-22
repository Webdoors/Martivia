<?php
$a=(int)$_POST['a'];
$bnr=mysqli_query($con,"SELECT * FROM rightbanner");
$rbnr=mysqli_fetch_assoc($bnr);


mysqli_query($con,"DELETE FROM rightbanner");

unlink("../../img/banners/".$rtb['img']);
echo 1;
?>