<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//KA" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/2012/xhtml" lang="ka">
<head>
    <link rel='stylesheet' type='text/css' href='/admin/css/style.css'/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IkaWeightlifter Admin</title>
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<link rel="icon"type="image/x-icon"href="https://newsebi.ge/img/icon.png"/>
</head>
<body>
<?php
//echo $_SERVER["REMOTE_ADDR"];
?>
<form class="MN">
<label style="font-family:calibri;">IkaWeightlifter Admin</label>
<br>
<br>
<input type="text" placeholder="Username" name="username" autocomplete="on" class="INP USR"/>
<input type="password" placeholder="Password" name="password" autocomplete="off" class="INP PAS"/>
<input type="button" value="Login" class="IN BUT"/>
</form>
<div id="snackbar"></div>
</body>
</html>
<style>
.MN img{
	margin:auto;
}
.MN{
	padding:20px;
    width: 250px;
    height: auto;
    border: solid 1px #DDD;
    border-radius: 4px;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
	-ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
	-o-transform: translate(-50%,-50%);
}
.INP{
	text-align: center;
	width: calc(100% - 5px);
    margin: 0px 0px 10px 0px;
    height: 30px;
	border:solid 1px #DDD;
}
.BUT{
    width: calc(100% - 1px);
    height: 36px;
	cursor:pointer;
}
</style>
