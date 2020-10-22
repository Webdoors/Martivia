<?php
$opertype=mysqli_real_escape_string($con, $_POST["opertype"]);
$ids=mysqli_real_escape_string($con, $_POST["ids"]);
$doc = new DOMDocument();
$doc->loadHTMLFile("../newsletter/index.html");
$message=$doc->saveHTML();
$from = 'newsletter@4seasonsgeorgia.ge';
$subject="4seasonsgeorgia";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
$query="SELECT email FROM `subscribers` WHERE id IN($ids)";
$result=$con->query($query);
$emails=array();
while($data=$result->fetch_array(MYSQLI_ASSOC)){
    array_push($emails, $data["email"]);
}
$to=implode(",",$emails);
// Sending email
if(mail($to,$subject,$message,$headers)){
    // update subscribers status
    $nslquery="SELECT id FROM `newsletter` ORDER BY id DESC LIMIT 1";
    $nslresult=$con->query($nslquery);
    $nsldata=$nslresult->fetch_array(MYSQLI_ASSOC);
    $inquery="UPDATE `subscribers` SET newsletter_id=".$nsldata['id']." WHERE id IN($ids) ";
    $con->query($inquery);
    echo 1;
} else{
    echo 2;
}
