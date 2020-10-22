<?php
$a=mysqli_real_escape_string($con, $_FILES['a']['name']);

$nsp=mysqli_query($con,"SELECT * FROM Incidentallypict");
$rnsp=mysqli_fetch_assoc($nsp);
if(mysqli_num_rows($nsp)==0)
{
	mysqli_query($con,"INSERT INTO Incidentallypict (picture) VALUES ('$a') ");
	echo 1;
	chmod("../../img/sxvatashoris", 0777);
	$atvirtva=move_uploaded_file($_FILES['a']['tmp_name'],"../../img/sxvatashoris/".$a);
}
else
	
	{ chmod("../../img/sxvatashoris", 0777);
		unlink("../../img/sxvatashoris/".$rnsp['picture']);
		mysqli_query($con,"UPDATE Incidentallypict SET picture='$a' ");
		
		$atvirtva=move_uploaded_file($_FILES['a']['tmp_name'],"../../img/sxvatashoris/".$a);
		echo 1;
	}
	
	 if(file_exists("../../img/sxvatashoris"))
	 {
		 echo 'aris';
	 }
?>