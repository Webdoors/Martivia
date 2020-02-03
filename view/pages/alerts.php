<br>&nbsp;
<div class="container">
<table class="table table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<td>Id</td>
			<td>Description</td>
			<td>ScoringId</td>
			<td>Date</td>
		</tr>
	</thead>
	<tbody>
<?php
	$ACP=1;
	if($_REQUEST["p"]>0){
		$ACP=$_REQUEST["p"];
	}
	$PA=100;
	$fr=($ACP-1)*$PA;
	$q1=mysqli_query($con,"SELECT * FROM alerts ORDER BY id DESC LIMIT $PA OFFSET $fr");
	while($r1=mysqli_fetch_array($q1)){
?>
	<tr>
		<td><?=$r1["id"]?></td>
		<td><?=$r1["description"]?></td>
		<td><?=$r1["scoringid"]?></td>
		<td><?=date("d-m-Y H:i:s",$r1["date"])?></td>
	</tr>
<?php		
	}
?>
	</tbody>
</table>
<?php
$q3=mysqli_query($con,"SELECT * FROM alerts");
?>
	<div class="col-md-12 MID NOP">
		<a href="?page=alerts&mc=dashboard&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
		<a href="?page=alerts&mc=dashboard&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
		<?php
		for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
			if(($ACP-5)<=$i&&($ACP+5)>=$i){
		?>
		<a href="?page=alerts&mc=dashboard&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
		<?php }
		}
		?>
		<a href="?page=alerts&mc=dashboard&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
		<a href="?page=alerts&mc=dashboard&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
