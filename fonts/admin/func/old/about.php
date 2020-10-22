<?php

$a = mysqli_real_escape_string($con, $_POST['a']);
$b = mysqli_real_escape_string($con, $_POST['b']);
$c = mysqli_real_escape_string($con, $_POST['c']);
$d = mysqli_real_escape_string($con, $_POST['d']);
$e = mysqli_real_escape_string($con, $_POST['e']);
$g = mysqli_real_escape_string($con, $_POST['g']);


	mysqli_query($con,"UPDATE about SET $b='$c' WHERE id='$d' ");
    mysqli_query($con,"UPDATE  langs SET column_value='$e' WHERE table_name='$a' AND table_id='$d' AND table_column='$b' AND short_name='en' ");
	mysqli_query($con,"UPDATE  langs SET column_value='$g' WHERE table_name='$a' AND table_id='$d' AND table_column='$b' AND short_name='ru' ");
//$lng=mysqli_query($con,"SELECT * FROM langs WHERE table_id='$d' AND table_name='$a' AND table_column='$b' AND table");

echo 1;


?>