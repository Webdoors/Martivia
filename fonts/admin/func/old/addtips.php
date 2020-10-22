<?php

$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);
$d=mysqli_real_escape_string($con,$_POST['d']);
$e=mysqli_real_escape_string($con,$_POST['e']);
$g=mysqli_real_escape_string($con,$_POST['g']);

$f=mysqli_real_escape_string($con,$_POST['f']);

mysqli_query($con,"INSERT INTO tips SET title='$a', description='$d',  image='$f' ");
$tm=mysqli_query($con,"SELECT id FROM tips ORDER BY id DESC");
$rtm=mysqli_fetch_assoc($tm);


$lng=mysqli_query($con,"SELECT * FROM langs WHERE table_name='tips' AND table_id='".$rtm['id']."' ");
		if(mysqli_num_rows($lng)==0)
		{
			mysqli_query($con,"INSERT INTO langs SET column_value='$b', table_name='tips', table_id='".$rtm['id']."', table_column='title', short_name='en', name='russian'");
            mysqli_query($con,"INSERT INTO langs SET column_value='$c', table_name='tips', table_id='".$rtm['id']."', table_column='title', short_name='ru', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$e', table_name='tips', table_id='".$rtm['id']."', table_column='description', short_name='en', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$g', table_name='tips', table_id='".$rtm['id']."', table_column='description', short_name='ru', name='russian' ");
		}
		echo 1;



?>