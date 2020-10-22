<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$PA=30;
$fr=($ACP-1)*$PA;
if($_REQUEST["key"]!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]);
	$WSE=" AND (t1.pid LIKE '%".$KEY."%' OR t1.companyid LIKE '%".$KEY."%' OR t1.username LIKE '%".$KEY."%' OR t1.firstname LIKE '%".$KEY."%' OR t1.lastname LIKE '%".$KEY."%' OR t1.email LIKE '%".$KEY."%' OR t1.tel LIKE '%".$KEY."%')";
}
	$q1=mysqli_query($con,"SELECT t1.*,t2.name as 'cat' FROM articles as t1
LEFT JOIN categories as t2 ON(t1.category=t2.id)
	WHERE t1.id>0 AND t1.video=1 $WSE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
	$q100=mysqli_query($con,"SELECT * FROM trainings as t1 WHERE t1.id>0 $WSE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;
?>
<br>&nbsp;
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-4">
				<input class="form-control SERKEY2" placeholder="Search"/>
			</div>		
			<div class="col-sm-6">
				<button class="btn btn-default SER2">Search</button>
			</div>
			<div class="col-sm-2">
				<a class="btn btn-success" href="?page=training" data-original-title="" title="">Training-ის დამატება</a>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>N</th>
			<th>id</th>	
			<th>img</th>
			<th>title</th>
			<th>category</th>
			<th>date</th>
			<th>active</th>
			<th>ნახვა</th>
			<th>რედაქტირება</th>
			<th>წაშლა</th>
		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
?>
		  <tr>
			<th><?=$cou?></th>
			<th><?=$r1["id"]?></th>	
			<th><img src="<?=$r1["img"]?>" style="width:70px" /></th>
			<th><?=$r1["title"]?></th>
			<th><?=$r1["cat"]?></th>
			<th><?=$r1["date"]?></th>
			<th><input type='checkbox'<?=$r1["active"]=="0"?"checked":""?> class='form-control activ' d="<?=$r1["id"]?>" /></th>
			<th><a href="https://newsebi.ge/posts/<?=$r1["id"]?>"><button class="btn btn-outline-primary">ნახვა</button></a></th>
			<th><a href="?page=article&id=<?=$r1["id"]?>"><button class="btn btn-outline-success">რედაქტირება</button></a></th>
			<th><button class="btn btn-outline-danger DGA" d="<?=$r1["id"]?>" n="articles">წაშლა</button></th>
		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT * FROM trainings as t1 WHERE t1.id>0 $WSE ");
?>
	<div class="col-md-12 MID">
	<a href="?page=trainings&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=trainings&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=trainings&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=trainings&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=trainings&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>
<br>