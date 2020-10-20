<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$fr=($ACP-1)*30;
?>
<div class="container-fluid">
	<div class="col-md-12 LIS H">
		<div class="D1" style="width:60px">Id</div>
		<div class="D2" style="width:180px">სახელი</div>
		<div class="D3" style="width:180px">გვარი</div>
		<div class="D4" style="width:180px">ადმინი</div>
		<div class="D5" style="width:180px">პაროლი</div>
		<div class="D5" style="width:180px">მობილური</div>
		<div class="D6" style="width:180px">დამატება/წაშლა</div>	
	</div>
	<div class="col-md-12 LIS H">
		<div class="D1" style="width:60px"></div>
		<div class="D2" style="width:180px"><input placeholder="სახელი" class="ADN"/></div>
		<div class="D3" style="width:180px"><input placeholder="გვარი" class="ADL"/></div>
		<div class="D4" style="width:180px"><input placeholder="ადმინი" class="ADA"/></div>
		<div class="D5" style="width:180px"><input type="password" placeholder="Password" class="ADP"/></div>
		<div class="D5" style="width:180px"><input placeholder="მობილური" class="ADT"/></div>
		<div class="D6" style="width:180px"><input value="დამატება" type="button" class="ADB"/></div>	
	</div>
	<?php
	$q1=mysqli_query($con,"SELECT * FROM admins ORDER BY Id ASC LIMIT 30 OFFSET ".$fr."");
	while($r1=mysqli_fetch_array($q1)){
	?>
	<div class="col-md-12 LIS">
		<div class="D1" style="width:60px"><?=$r1["Id"]?></div>
		<div class="D2" style="width:180px"><?=$r1["name"]?></div>
		<div class="D3" style="width:180px"><?=$r1["lastname"]?></div>
		<div class="D4" style="width:180px"><?=$r1["user"]?></div>
		<div class="D5" style="width:180px">********</div>
		<div class="D5" style="width:180px"><?=$r1["tel"]?></div>
		<div class="D6" style="width:180px"><a class="ADC"d="<?=$r1["Id"]?>">წაშლა</a></div>
	</div>
	<?php
	}
	?>
	<ul class="col-md-12 pagination LIS P">
	<?php
	$q3=mysqli_query($con,"SELECT Id FROM admins");
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
	?><li>
	<a href="?page=admins&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> AMI"><?=$i?></a>
	</li>
	<?php
	}
	?>
	<li class="next"><a href="?page=admins&p=1"><i class="fa fa-angle-right"></i></a></li>
	<li class="last"><a href="?page=admins&p=1">Last</a></li>
	</ul>
</div>

