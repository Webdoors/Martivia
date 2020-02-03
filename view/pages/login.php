<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//KA" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/2012/xhtml" lang="ka"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>API ADMIN Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon"type="image/x-icon"href="https://qcash.ge/img/m.png"/>
		<link href="https://qcash.ge/supr/css/icons.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="https://qcash.ge/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://qcash.ge/merchant/admin/css/style.css?v=1"/>
		<link rel="stylesheet" type="text/css" href="https://qcash.ge/js/geokbd/jquery.geokbd.css" />
		<script src="https://code.jquery.com/jquery-latest.min.js"></script>
		<script src="https://qcash.ge/js/jquery-migrate-1.2.1.js"></script>
</head>
<body>
<?php
$token=mysqli_real_escape_string($con,$_GET["token"]);
$user=encrypt_decrypt("decrypt",$token);
$user=explode("|",$user)[0];
function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'qJB0rGtIn5UB1xG03efyCp';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
$q1=mysqli_query($con,"SELECT * FROM admins WHERE user='".$user."'");
if(mysqli_num_rows($q1)>0){
	$r1=mysqli_fetch_array($q1);
	$_SESSION['MGuserID']=$r1["Id"];
	$_SESSION['MGtimeout']=time()+60*60*12;
	 // var_dump($_SESSION);
?>
<script>location.href="/admin";</script>
<?php
}
?>	
<form class="MN">
				<div class="col-md-12 text-center">
					<h2>API Admin Panel</h2>
				</div>	
<input type="text" placeholder="Username" name="username" class="IN USR form-control"/>
<input type="password" placeholder="Password" name="password" class="IN PAS form-control"/>
<input class="SMI IN form-control" placeholder="******" /> 
<input type="button" class="SMB btn btn-default" value="SMS"/>
<input type="button" value="Login" class="IN BUT btn btn-default"/>
<br>
Powered by Quickcash LLC
</form>
</body>
</html>
<style>
</style>
	<script src="https://api.qcash.ge/admin/js/main.js"></script>
	<script src="https://qcash.ge/js/bootstrap.min.js"></script>
	<script src="https://qcash.ge/js/bootbox.min.js"></script>