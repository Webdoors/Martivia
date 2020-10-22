

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
	$q1=mysqli_query($con,"SELECT t1.*,
	(SELECT column_value FROM langs WHERE table_id=t1.id AND short_name='ru' AND table_name='news' AND table_column='title') AS rutitle, 
	(SELECT column_value FROM langs WHERE table_id=t1.id AND short_name='en' AND table_name='news' AND table_column='title') AS engtitle, 
	(SELECT column_value FROM langs WHERE table_id=t1.id AND short_name='ru' AND table_name='news' AND table_column='text') AS rutext, 
	(SELECT column_value FROM langs WHERE table_id=t1.id AND short_name='en' AND table_name='news' AND table_column='text') AS engtext
	FROM news as t1	WHERE t1.id>0 $WSE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
	$q100=mysqli_query($con,"SELECT * FROM news as t1 WHERE t1.id>0 $WSE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr." ");
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;

?>
<br>&nbsp;
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
	   <div class="row my-2">
			
			<div class="col-sm-4">
				<h2>სიახლეები</h2>
			</div>
		</div>
	
		<div class="row my-2">
			<div class="col-sm-4">
				<input class="form-control SERKEY2" placeholder="Search"/>
			</div>
			<div class="col-sm-4">
				<button class="btn btn-default SER2">Search</button>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>N</th>
			<th>id</th>	
			<th>img</th>
			<th>title</th>
			<th>engtitle</th>
			<th>rutitle</th>
			<th>comments_number</th>
			<th>აქტიური</th>
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
			<th><?=$r1["engtitle"]?></th>
			<th><?=$r1["rutitle"]?></th>
			<th><?=$r1["comments_number"]?></th>
			<th><input type='checkbox'<?=$r1["active"]=="0"?"checked":""?> class='form-control activ' d="<?=$r1["id"]?>" /></th>
			<th>
			<?php
			if($r1['slug']!='')
			{
			?>
			<a href="https://4seasonsgeorgia.ge/ge/article/<?=$r1["slug"]?>/<?=$r1["id"]?>"><button class="btn btn-outline-primary">ნახვა</button></a>
			<?php
			}
			?>
			</th>
			<th><a href="?page=article&id=<?=$r1["id"]?>"><button class="btn btn-outline-success">რედაქტირება</button></a></th>
			<th><button class="btn btn-outline-danger DGA" d="<?=$r1["id"]?>" n="news" page='article' >წაშლა</button></th>
		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT * FROM news as t1 WHERE t1.id>0 $WSE ");
?>
	<div class="col-md-12 MID">
	<a href="?page=home&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=home&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=home&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=home&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=home&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>
<br>