<link rel="stylesheet" type="text/css" href="css/user.css"/>
<script src="js/user.js"></script>
<?php 
$uid=mysqli_real_escape_string($con,$_REQUEST["id"]);
$q1=mysqli_query($con,"SELECT * FROM merchants WHERE Id='$uid'");
$r1=mysqli_fetch_array($q1);
?>
<div class="container-fluid NOP">
	<div class="col-sm-6 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 col-md-3 NOP">
		<div class="BOX">
			<div class="PIS H1">ინფორმაცია მერჩანტზე</div>
			<div class="PIS">Merchant : <?=$r1["name"]?></div>	
			<div class="PIS">Merchant CID : <?=$r1["cid"]?></div>
			<div class="PIS">Username : <?=$r1["username"]?></div>
			<div class="PIS">Active : <?=$r1["active"]?></div>
		</div>
	</div>
	<div class="col-sm-6 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 col-md-9 NOP">
		<br>
<?php
	$upage="params";
	if(isset($_GET["upage"])){
		$upage=$_GET["upage"];
	}
?>
		<a type="button" href="?page=user&upage=params&id=<?=$uid?>" class="btn <?=$upage=="params"?"btn-primary":"btn-default"?> btn-block mb10 BAT">პარამეტრები</a>
		<a type="button" href="?page=user&upage=scorings&id=<?=$uid?>" class="btn <?=$upage=="scorings"?"btn-primary":"btn-default"?> btn-block mb10 BAT"><?=$r1["name"]?>-ის სქორინგები</a>
		<a type="button" href="?page=user&upage=invoices&id=<?=$uid?>" class="btn <?=$upage=="invoices"?"btn-primary":"btn-default"?> btn-block mb10 BAT">ინვოისები</a>
	</div>
	<div class="col-sm-6 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 col-md-9 NOP">
	<?php
	include("user/".$upage.".php");
	?>
	</div>
</div>
<div class="WIN W1">
<div class="W1C">
</div>
<div class="IXI IX1"></div>
</div>
<div class="BM B1"></div>