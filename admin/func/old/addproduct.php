<?php
session_start();
if(isset($_SESSION['GuserID'])){
	mysqli_query($con,"INSERT INTO products SET name=''");
	echo mysqli_insert_id($con);
}
?>