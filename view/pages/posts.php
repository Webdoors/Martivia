<div class="col-md-12 NOP MTO">
<?php
$a=mysqli_real_escape_string($con,$_GET["id"]);
$q1=mysqli_query($con,"SELECT * FROM posts WHERE id='".$a."'");
$r1=mysqli_fetch_array($q1);
$q2=mysqli_query($con,"SELECT * FROM pages WHERE id='".$r1["pageid"]."'");
$r2=mysqli_fetch_array($q2);
?>
<div class="col-md-12">
	<h2><a href="?page=page&id=<?=$r2["id"]?>"><?=$r2["titlegeo"]?></a></h2>
</div>
	<div class="col-md-12">
		<h3><?=$r1["title"]?></h3>
	</div>
	<div class="col-md-12">
	<?=$r1["text"]?>
	</div>
</div>