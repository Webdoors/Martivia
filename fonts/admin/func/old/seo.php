<?php

$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);
$d=mysqli_real_escape_string($con,$_POST['d']);
$e=mysqli_real_escape_string($con,$_POST['e']);
$g=mysqli_real_escape_string($con,$_POST['g']);

$table_name='seo'.$a;

mysqli_query($con,"UPDATE seo SET  column_value='$d'  WHERE  page_id='$c' AND page_name='$a' AND page_column='$b' ");
mysqli_query($con,"UPDATE langs SET column_value='$e' WHERE table_name='$table_name' AND table_column='$b' AND table_id='$c' AND short_name='en' ");
mysqli_query($con,"UPDATE langs SET column_value='$g' WHERE table_name='$table_name' AND table_column='$b' AND table_id='$c' AND short_name='ru' ");

?>