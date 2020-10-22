<?php

if(isset($_SESSION['GuserID'])){

	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$g=mysqli_real_escape_string($con,$_POST["g"]);
	$f=mysqli_real_escape_string($con,$_POST["f"]);
	$h=mysqli_real_escape_string($con,$_POST["h"]);

	$pos=1;
	
    $alsld=mysqli_query($con,"SELECT * FROM slider ORDER BY position DESC");
	if(mysqli_num_rows($alsld)>0)
	{
	$ralsld=mysqli_fetch_assoc($alsld);
	$pos=++$ralsld['position'];
	}
		mysqli_query($con,"INSERT INTO slider (name,url,image,description,position) VALUES ('$a','$d','$e','$g','$pos')");
		$sld=mysqli_query($con,"SELECT id FROM slider ORDER BY id DESC");
		$rsld=mysqli_fetch_assoc($sld);
		$lng=mysqli_query($con,"SELECT * FROM langs WHERE table_name='slider' AND table_id='".$rsld['id']."' ");
		if(mysqli_num_rows($lng)==0)
		{
			mysqli_query($con,"INSERT INTO langs SET column_value='$c', table_name='slider', table_id='".$rsld['id']."', table_column='name', short_name='ru', name='russian'");
            mysqli_query($con,"INSERT INTO langs SET column_value='$b', table_name='slider', table_id='".$rsld['id']."', table_column='name', short_name='en', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$f', table_name='slider', table_id='".$rsld['id']."', table_column='description', short_name='en', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$h', table_name='slider', table_id='".$rsld['id']."', table_column='description', short_name='ru', name='russian' ");
		}
		echo 1;
	

	
	
}

?>