<?php

	date_default_timezone_set("Asia/Tbilisi");
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$qsalt=mysqli_query($con,"SELECT salt FROM admins WHERE user='$a'");
	$rs=mysqli_fetch_array($qsalt);
	$pass=hash('sha256', $b . $rs["salt"]);
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE user='$a' AND pass='$pass'");
	$r1=mysqli_fetch_array($q1);
if(mysqli_num_rows($q1)>0){
	$code=randomPassword(4);
	mysqli_query($con,"INSERT INTO adminsms SET code='".$code."',adminid='".$r1["Id"]."',date='".time()."',ip='".$_SERVER["REMOTE_ADDR"]."'");
	require_once('/var/www/qcash.ge/sms/Maradit.php');
	$maradit = new Maradit("quickcash", "654555");
	$to_list = array('+995'.$r1["tel"]); // array('38761233976', '00905304012530', '+905364257920');
	$message =$code;
	$response = $maradit->submit($to_list, $message, null, null, null, 'UCS2');	
	echo 1;
}else{
	echo 2;
}
function randomPassword($c) {
    $alphabet = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $c; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>