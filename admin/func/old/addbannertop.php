<?php
$a=mysqli_real_escape_string($con, $_FILES['a']['name']);
$tpb=mysqli_query($con, "SELECT * FROM topbanner");
$rtb=mysqli_fetch_assoc($tpb);
if(mysqli_num_rows($tpb)==0)
{
	mysqli_query($con,"INSERT INTO topbanner (img) VALUES ('$a') ");
}
else
{
	chmod("../../img/banners", 0777);
		unlink("../../img/banners/".$rtb['img']);
		mysqli_query($con,"UPDATE topbanner SET img='$a' ");
		$atvirtva=move_uploaded_file($_FILES['a']['tmp_name'],"../../img/banners/".$a);
		echo 1;
}
?>