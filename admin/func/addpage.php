<?php
session_start();
if(isset($_SESSION['GuserID'])){
	mysqli_query($con,"INSERT INTO pages SET titlegeo=''");
	echo mysqli_insert_id($con);
}
?>