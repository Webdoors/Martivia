<?php
$table=mysqli_real_escape_string($con,sanit_data($_POST["t"]));
$col=mysqli_real_escape_string($con,sanit_data($_POST["col"]));
$id=mysqli_real_escape_string($con,sanit_data($_POST["id"]));
$enabled=mysqli_real_escape_string($con,sanit_data($_POST["enabled"]));

$query="UPDATE ".$table." SET ".$col."='".$enabled."' WHERE id=".$id."";
if(!$con->query($query)){
    die($con->error."query:".$query);
}else {
    echo 1;
}