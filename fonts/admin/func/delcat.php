<?php
$catid=mysqli_real_escape_string($con,sanit_data($_POST["id"]));
$query="DELETE FROM category WHERE id='$catid'";
if(!$con->query($query)){
    die($con->error."query:".$query);
}else {
    echo 1;
}