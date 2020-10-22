<?php
$a=mysqli_real_escape_string($con, $_FILES['a']['name']);
$rb=mysqli_query($con, "SELECT * FROM rightbanner");
$rrb=mysqli_fetch_assoc($rb);
if(mysqli_num_rows($rb)==0)
{
	mysqli_query($con,"INSERT INTO rightbanner (img) VALUES ('$a') ");
}
else
{
	chmod("../../img/banners", 0777);
		unlink("../../img/banners/".$rrb['img']);
		mysqli_query($con,"UPDATE rightbanner SET img='$a' ");
		$atvirtva=move_uploaded_file($_FILES['a']['tmp_name'],"../../img/banners/".$a);
		echo 1;
}
?>