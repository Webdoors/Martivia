<?php

$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);
$d=mysqli_real_escape_string($con,$_POST['d']);


$table_name='seo'.$a;

mysqli_query($con,"UPDATE seo SET  column_value='$d'  WHERE  table_id='$c' AND page_name='$a' AND table_column='$b' ");


?>