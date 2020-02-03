<?php
session_start();

if(isset($_SESSION['MGuserID'])){
	$ACP=1;
	if($_REQUEST["p"]>0){
		$ACP=$_REQUEST["p"];
	}
	$fr=($ACP-1)*30;
	
?>
<?php
if($r12["users"]==1){
?>	
<script src="https://qcash.ge/merchant/admin/js/users.js"></script>
<div class="container-fluid NOP">
	<div class="col-md-12 LIS H NOP">
		<div class="col-md-2">
			<input class="form-control MNA" placeholder="მერჩანტის სახელი"/>
		</div>
		<div class="col-md-2">
			<input class="form-control MC" placeholder="მერჩანტის ს/კ"/>
		</div>
		<div class="col-md-2">
			<input class="form-control MU" placeholder="Username"/>
		</div>
		<div class="col-md-2">
			<input type="button" class="btn btn-primary ADME" value="დამატება"/>
		</div>
	</div>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Count</th>
			<th>Mid</th>
			<th>კომპანიის ID</th>
			<th>კომპ. სახელი</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email / Tel</th>
			<th>Apy-Key</th>
			<th>აქტიური</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php
	$q1=mysqli_query($con,"SELECT * FROM users ORDER BY id DESC ");
	$cou=mysqli_num_rows($q1)-($ACP-1)*30;
	while($r1=mysqli_fetch_array($q1)){
?>
		<tr>
			<td><?=$cou?></td>
			<td><?=$r1["id"]?></td>
			<td><?=$r1["companyid"]?></td>
			<td><?=$r1["name"]?></td>
			<td><?=$r1["username"]?></td>
			<td><?=$r1["password"]?></td>
			<td><?=$r1["email"]?> / <?=$r1["tel"]?></td>
			<td><?=$r1["apikey"]?></td>
			<td><?=$r1["active"]?></td>
			<td><input type="button" class="btn btn-outline-danger DEL" t="users" d="<?=$r1["id"]?>" value="Delete"/></td>
		</tr>	
<?php	
$cou=$cou-1;
	}
?>
	</tbody>
</table>
<div class="col-md-12 LIS MID">
<?php
$q3=mysqli_query($con,"SELECT * FROM users");
for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
?>
<a href="?page=users&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
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