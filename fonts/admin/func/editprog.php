<?php
$progid=mysqli_real_escape_string($con,sanit_data($_POST["id"]));
$query="SELECT * FROM programme WHERE id='$progid'";
if(!$result=$con->query($query)){
    die($con->error."query:".$query);
}else {
    $r=json_encode($result->fetch_array(MYSQLI_ASSOC));
    echo $r;
}