<?php
$progid=mysqli_real_escape_string($con,sanit_data($_POST["id"]));
$query="DELETE FROM programme WHERE id='$progid'";
if(!$con->query($query)){
    die($con->error."query:".$query);
}else {
    echo 1;
}