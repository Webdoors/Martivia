<?php

	
$title=mysqli_real_escape_string($con,$_POST["title"]);
$titleen=mysqli_real_escape_string($con,$_POST["titleen"]);
$titleru=mysqli_real_escape_string($con,$_POST["titleru"]); 
$text=mysqli_real_escape_string($con,$_POST["text"]);
$texten=mysqli_real_escape_string($con,$_POST["texten"]); 
$textge=mysqli_real_escape_string($con,$_POST["textge"]);
$pin=mysqli_real_escape_string($con,$_POST["pin"]);
$link=mysqli_real_escape_string($con,$_POST["link"]);
$lat=mysqli_real_escape_string($con,$_POST["lat"]);
$lng=mysqli_real_escape_string($con,$_POST["lng"]);

mysqli_query($con,"INSERT INTO map SET title='$title', text='$text',  link='$link', lat='$lat',lng='$lng',img='$pin' ");
$tm=mysqli_query($con,"SELECT id FROM map ORDER BY id DESC");
$rtm=mysqli_fetch_assoc($tm);


$lng=mysqli_query($con,"SELECT * FROM langs WHERE table_name='map' AND table_id='".$rtm['id']."' ");
		if(mysqli_num_rows($lng)==0)
		{
			mysqli_query($con,"INSERT INTO langs SET column_value='$b', table_name='map', table_id='".$rtm['id']."', table_column='title', short_name='en', name='russian'");
            mysqli_query($con,"INSERT INTO langs SET column_value='$c', table_name='map', table_id='".$rtm['id']."', table_column='title', short_name='ru', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$e', table_name='map', table_id='".$rtm['id']."', table_column='text', short_name='en', name='english' ");
            mysqli_query($con,"INSERT INTO langs SET column_value='$g', table_name='map', table_id='".$rtm['id']."', table_column='text', short_name='ru', name='russian' ");
		}
		echo 1;


?>