<?php

$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);
$d=mysqli_real_escape_string($con,$_POST['d']);
$e=mysqli_real_escape_string($con,$_POST['e']);
$g=mysqli_real_escape_string($con,$_POST['g']);
$f=mysqli_real_escape_string($con,$_POST['f']);
$h=mysqli_real_escape_string($con,$_POST['h']);
$i=mysqli_real_escape_string($con,$_POST['i']);
$j=mysqli_real_escape_string($con,$_POST['j']);

mysqli_query($con,"INSERT INTO teams SET name='$a', lastname='$d',  position='$f', image='$j' ");
$tm=mysqli_query($con,"SELECT id FROM teams ORDER BY id DESC");
$rtm=mysqli_fetch_assoc($tm);


$lng=mysqli_query($con,"SELECT * FROM langs WHERE table_name='teams' AND table_id='".$rtm['id']."' ");
		if(mysqli_num_rows($lng)==0)
		{
			mysqli_query($con,"INSERT INTO langs SET column_value='$b', table_name='teams', table_id='".$rtm['id']."', table_column='name', short_name='en', name='russian'");
            mysqli_query($con,"INSERT INTO langs SET column_value='$c', table_name='teams', table_id='".$rtm['id']."', table_column='name', short_name='ru', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$e', table_name='teams', table_id='".$rtm['id']."', table_column='lastname', short_name='en', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$g', table_name='teams', table_id='".$rtm['id']."', table_column='lastname', short_name='ru', name='russian' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$h', table_name='teams', table_id='".$rtm['id']."', table_column='position', short_name='en', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$i', table_name='teams', table_id='".$rtm['id']."', table_column='position', short_name='ru', name='russian' ");
		}
		echo 1;



?>