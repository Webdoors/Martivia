<?php
$params=array();
foreach ($_POST  as $key=>$value){
    if($key=="fname"){
        continue;
    }
    $key=sanit_data((string)$key);
    $val=sanit_data($value);
    $params[$key]=$val;
}
$values="'".implode("','",$params)."'";
$query="INSERT INTO programme(ka_prog_title,en_prog_title,ru_prog_title,ka_desc,en_desc,ru_desc,ka_city,en_city,
ru_city,ka_loc_name,en_loc_name,ru_loc_name,eventdate,time,loc_url,enabled)
VALUES ($values)";
if(!$con->query($query)){
    die($con->error."query:".$query);
}else {
    echo 1;
}