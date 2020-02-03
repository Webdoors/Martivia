<div class="container-fluid NOP">
	<div class="col-sm-6 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 col-md-12 NOP">
	<br>
<script src="js/reports.js"></script>
<table class="t1 table table-striped table-bordered dataTable">
		
		<thead>
		<tr>
			<th>Count</th>
			<th>Id</th>
			<th>Merchant</th>
			<th>კომპანიის საიდენტიფიკაციო კოდი</th>
			<th>კომპანიის დასახელება</th>
			<th>სქორის თარიღი</th>
			<th>დადებითი სქორი (კი/არა)</th>
			<th>სქორი</th>
			<th>მატრიცა</th>
			<th>სტატუსი</th>
			<th>შემოწმება</th>
		</tr>
		</thead>
		<tbody>
<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$muser=mysqli_real_escape_string($con,$_GET["id"]);
$OBY=mysqli_real_escape_string($con,$_GET["oby"]);
$ord=mysqli_real_escape_string($con,$_GET["ord"]);
if(strlen($OBY)>0&&strlen($ord)>0){
	$ORD="ORDER BY ".$OBY." ".$ord;
	$FPO="&oby=".$OBY."&ord=".$ord;
}else{
	$ORD="";
	$FPO="";
}
$fr=($ACP-1)*30;
$q1=mysqli_query($con,'SELECT t1.creditstatus as crstatus,t1.checked,t1.Id,t1.cname,t1.muser,t1.userid,t1.status as scostatus,t1.CID,t1.date as "scoringdate",(select t5.Id FROM scoring as t5 WHERE t1.userid=t5.userid
ORDER BY `t5`.`Id` ASC LIMIT 1) as "scoid"    FROM `scoring` as t1 WHERE t1.muser='."'".$muser."'".' ORDER BY t1.Id DESC LIMIT 30 OFFSET '.$fr.'');
$q100=mysqli_query($con,'SELECT t1.Id,t1.userid,t1.status as scostatus,t1.CID,t1.date as "scoringdate",(select t5.Id FROM scoring as t5 WHERE t1.userid=t5.userid
ORDER BY `t5`.`Id` ASC LIMIT 1) as "scoid"    FROM `scoring` as t1 ORDER BY t1.Id DESC ');
	$cou=mysqli_num_rows($q100)-($ACP-1)*30;
		
while($r1=mysqli_fetch_array($q1)){
	$q3=mysqli_query($con,"SELECT username from merchants WHERE id='".$r1["muser"]."' LIMIT 1");
	$r3=mysqli_fetch_array($q3);
?>
			<tr>
				<td><?=$cou?></td>
				<td><?=$r1["Id"]?></td>
				<td><?=$r3["username"]?></td>
				<td><?=$r1["CID"]?></td>
				<td><?=$r1["cname"]?></td>
				<td><?=$r1["scoringdate"]?date("d-m-Y",$r1["scoringdate"]):""?></td>
				<td>
<?php
if($r1["scoringdate"]){
?>
				<?=$r1["scostatus"]?"კი":"არა"?>
<?php
}
?>
				</td>
				<td>
<?php
if($r1["scoringdate"]!=""){
?>			
					<button type="button" href="?page=reports&id=1" class="btn btn-default btn-block mb10 GSC" d="<?=$r1["Id"]?>">დეტალურად</button>
<?php
}
?>					
				</td>	
				<td>
<?php
if($r1["scoringdate"]!=""){
?>			
					<button type="button" href="?page=reports&id=1" class="btn btn-default btn-block mb10 GSM" d="<?=$r1["Id"]?>">მატრიცა</button>
<?php
}
$q4=mysqli_query($con,"SELECT * FROM scorecreditmap WHERE id='".$r1["crstatus"]."' ");
$r4=mysqli_fetch_array($q4);
?>					
				</td>	
				<td>
				<?=$r4["statusname"]?>
				</td>
				<td><input class="CHE" type="checkbox" d="<?=$r1["Id"]?>" <?=$r1["checked"]==1?"checked":""?> /></td>				
			</tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
<?php
$q3=mysqli_query($con,'SELECT t1.userid,t1.CID,(select t3.date FROM scoring as t3 WHERE t1.userid=t3.userid
ORDER BY `t3`.`Id` ASC LIMIT 1) as "scoringdate",(select t3.status FROM scoring as t3 WHERE t1.userid=t3.userid
ORDER BY `t3`.`Id` ASC LIMIT 1) as "scostatus",(select t3.Id FROM scoring as t3 WHERE t1.userid=t3.userid
ORDER BY `t3`.`Id` ASC LIMIT 1) as "scoid"    FROM `scoring` as t1 WHERE t1.muser='."'".$muser."'".' ORDER BY t1.userid DESC');
?>
<ul class="pagination">
<?php
if(ceil(mysqli_num_rows($q3)/30)>1){
?>
	<li class="first disabled"><a href="#">First</a>
	</li>
	<li class="previous"><a href="#"><i class="fa fa-angle-left"></i></a>
	</li>
<?php
}
?>
<?php
for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
?>
	<li class="<?=($ACP==$i?"active":"")?>"><a href="?page=user&upage=scorings&id=<?=$muser?>&p=<?=$i?>"><?=$i?></a>
	</li>
<?	
}
?>	
	<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a>
	</li>
	<li class="last"><a href="#">Last</a>
	</li>
</ul>
<script>
</script>
	</div>
</div>
<script>

</script>