<div class="container p-5">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<td>Count</td>
			<td>Name</td>
			<td>Manualdate</td>
			<td>Manual</td>
			<td>Success</td>
			<td>Autodate</td>
			<td>Auto</td>
			<td>Comment</td>
			<td>User</td>
		</tr>	
	</thead>
	<tbody>
<?php
$cou=0;
$q1=mysqli_query($con,"SELECT * FROM checks");
while($r1=mysqli_fetch_array($q1)){
	$cou++;
?>
		<tr  class="table-<?=$r1["success"]=="1"?"success":"danger"?>">
			<td><?=$cou?></td>
			<td><?=$r1["name"]?></td>
			<td><?=date("d/m/Y H:i:s",$r1["manualdate"])?></td>
			<td><input type="checkbox" class="CHE2" d="manual" c="<?=$r1["id"]?>" <?=$r1["manual"]=="1"?"checked":""?> /></td>
			<td><input type="checkbox" class="CHE2" d="success" c="<?=$r1["id"]?>" <?=$r1["success"]=="1"?"checked":""?> /></td>
			<td><?=$r1["autodate"]!=""?date("d/m/Y H:i:s",$r1["autodate"]):""?></td>
			<td><input type="checkbox" class="CHE3" disabled d="auto" c="<?=$r1["id"]?>" <?=$r1["auto"]=="1"?"checked":""?> /></td>
			<td><textarea d="<?=$r1["id"]?>" style="height:40px;" class="form-control SAVCO"><?=$r1["comment"]?></textarea></td>
			<td><?=$r1["user"]?></td>
		</tr>
<?php
}
?>
	</tbody>
</table>
</div>
<style>
.table-success td{
background-color:#0ec0ca !important;
}
.CHE2,.CHE3{
	width: 25px;
    height: 24px;
}
</style>