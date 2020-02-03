<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$ACP=1;
	if($_REQUEST["p"]>0){
		$ACP=$_REQUEST["p"];
	}
	$fr=($ACP-1)*30;
$q12=mysqli_query($con,"SELECT * FROM permissions WHERE adminid='".$_SESSION['MGuserID']."'");
$r12=mysqli_fetch_array($q12);

?>
<?php
if($r12["admins"]==1){
?>	
<script src="https://qcash.ge/merchant/admin/js/admins.js"></script>
<div class="container-fluid NOP">
	<div class="col-md-12 LIS H NOP">
		<div class="col-md-2">
			<input class="form-control AN" placeholder="სახელი"/>
		</div>
		<div class="col-md-2">
			<input class="form-control AL" placeholder="გვარი"/>
		</div>
		<div class="col-md-2">
			<input class="form-control AU" placeholder="Username"/>
		</div>
		<div class="col-md-2">
			<input class="form-control AP" placeholder="Password"/>
		</div>
		<div class="col-md-2">
			<input class="form-control AT" placeholder="ტელეფონი"/>
		</div>
		<div class="col-md-2">
			<input type="button" class="btn btn-default ADA" value="დამატება"/>
		</div>
	</div>
	<div class="col-md-12 LIS H NOP">
		<div class="D1" style="width:150px;">AdminId</div>
		<div class="D2" style="width:150px;">სახელი</div>
		<div class="D3" style="width:150px;">გვარი</div>
		<div class="D4" style="width:150px;">Username</div>
		<div class="D5" style="width:150px;">Password</div>
		<div class="D5" style="width:150px;">ტელეფონი</div>
<?php
if($r12["permissions"]==1){
?>	
		<div class="D5" style="width:150px;">უფლებები</div>
<?php
}
?>	
		<div class="D7">წაშლა</div>
	</div>
<?php
$q1=mysqli_query($con,"SELECT * FROM admins");
while($r1=mysqli_fetch_array($q1)){	
?>
	<div class="col-md-12 LIS H NOP">
		<div class="D1" style="width:150px;"><?=$r1["Id"]?></div>
		<div class="D2" style="width:150px;"><?=$r1["name"]?></div>
		<div class="D3" style="width:150px;"><?=$r1["lastname"]?></div>
		<div class="D4" style="width:150px;"><?=$r1["user"]?></div>
		<div class="D5" style="width:150px;"><?=$r1["pass"]?></div>
		<div class="D5" style="width:150px;"><?=$r1["tel"]?></div>
<?php
if($r12["permissions"]==1){
?>	
		<div class="D5" style="width:150px;cursor:pointer;">	
			<a class="PRM" d="<?=$r1["id"]?>">უფლებები</a>		
		</div>	
<?php
}
?>		
		<div class="D7 DELA" d="<?=$r1["id"]?>" ><a class="btn btn-danger" style="cursor:pointer;color:#FFF;">წაშლა</a></div>
	</div>
<?php
}
?>
<div class="col-md-12 LIS MID">
<?php
$q3=mysqli_query($con,"SELECT * FROM admins ");
for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
?>
<a href="?page=admins&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
<?php
}
?>
</div>
</div>
<?php
}
?>
<?php
}
?>