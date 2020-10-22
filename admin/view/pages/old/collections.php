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
		<div class="D2" style="width:180px">Collection</div>
		<div class="D3" style="width:180px">ItemNum</div>
		<div class="D3" style="width:80px">Edit</div>
		<div class="D6" style="width:180px">Delete/Add</div>	
	</div>
	<div class="col-md-12 LIS H">
		<div class="D1" style="width:60px"></div>
		<div class="D2" style="width:180px"><input placeholder="Name of collection" class="ADN"/></div>
		<div class="D2" style="width:180px"></div>
		<div class="D2" style="width:80px"></div>
		<div class="D6" style="width:180px"><input value="Add" type="button" class="ACO"/></div>	
	</div>
	<?
	$q1=mysqli_query($con,"SELECT * FROM collections ORDER BY Id ASC LIMIT 30 OFFSET ".$fr."");
	while($r1=mysqli_fetch_array($q1)){
	?>
	<div class="col-md-12 LIS">
		<div class="D1" style="width:60px"><?=$r1["id"]?></div>
		<div class="D2" style="width:180px"><?=$r1["name"]?></div>
		<div class="D2" style="width:180px"></div>
		<div class="D2" style="width:80px"><a href="?page=collection&id=<?=$r1["id"]?>">Edit</a></div>
		<div class="D6" style="width:180px"><a class="DCO CU"d="<?=$r1["id"]?>">Delete</a></div>
	</div>
	<?
	}
	?>
	<ul class="col-md-12 pagination LIS P">
	<?
	$q3=mysqli_query($con,"SELECT id FROM collections");
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
	?><li>
	<a href="?page=admins&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> AMI"><?=$i?></a>
	</li>
	<?	
	}
	?>
	<li class="next"><a href="?page=admins&p=1"><i class="fa fa-angle-right"></i></a></li>
	<li class="last"><a href="?page=admins&p=1">Last</a></li>
	</ul>
</div>

