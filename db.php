<?php

$con=new mysqli($host, $db_user, $db_pass, $db_name);
if($con->connect_error){
    die("Failed to connect to MySQL Database: " ."<br>Errno:".$con->connect_errno."<br>Reason:".$con->connect_error);
}else {
    $char="utf8";
    $charset=(array)$con->get_charset();
    //var_dump($charset);
    if(empty(strtolower(strpos($charset["charset"], $char)))){
       $con->set_charset("utf8");
   }
    mb_internal_encoding("UTF-8");
}

