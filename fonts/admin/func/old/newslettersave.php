<?php
$text=explode("," ,mysqli_real_escape_string($con,$_POST["text"]));
$imgs=explode("," ,mysqli_real_escape_string($con,$_POST["img"]));
$jouquery="SELECT name, year, (SELECT name FROM `seasons` WHERE id=season_id) AS 'season', date FROM `journals` ORDER BY id DESC LIMIT 1";
$jouresult=$con->query($jouquery);
$joudata=$jouresult->fetch_array(MYSQLI_ASSOC);

$query =" INSERT INTO `newsletter` (edition_name,section1_text,section2_text,section3_text,section1_img,section2_img,section3_img)
 VALUES('".$joudata["name"]."-".$joudata["season"]."-".$joudata["date"]."-".$joudata["year"]."','$text[0]','$text[1]','$text[2]','$imgs[0]','$imgs[1],$imgs[2],$imgs[3]','$imgs[4]') ";


if(!$con->query($query)){
    echo 2;
}else{
    echo 1;
    //generate new html template
    $htmlfile="../newsletter/index.html";
    ob_start();
    require_once ("../newsletter/htmltemplate.php");
    $htmltempl = ob_get_contents();
    ob_end_clean();
    file_put_contents($htmlfile,$htmltempl);

}