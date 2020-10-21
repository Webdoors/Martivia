<div class="col-md-12 NOP MTO">
<?php
$a=mysqli_real_escape_string($con,$_GET["id"]);
$q1=mysqli_query($con,"SELECT * FROM pages WHERE id='".$a."'");
$r1=mysqli_fetch_array($q1);
?>
<div class="col-md-12">
	<h2><?=$r1["titlegeo"]?></h2>
</div>
<?php
if($r1["ptype"]==1){
?>
	<div class="col-md-12">
	<?=$r1["textgeo"]?>
	</div>
<?php
}
if($r1["ptype"]==2){
?>

<link rel="stylesheet" href="js/swiper/dist/css/swiper.min.css">
<style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #FFF;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height:400px;
	  margin:100px 0px;
    }
    .swiper-slide {
      overflow: hidden;
    }
  </style>
<div class="swiper-container">
	<div class="swiper-wrapper">
<?php
$q2=mysqli_query($con,"SELECT * FROM gallery WHERE pageid='".$r1["id"]."'");
while($r2=mysqli_fetch_array($q2)){
?>
		<div class="swiper-slide">
			<div class="swiper-zoom-container">
				<img src="<?=$r2["img"]?>">
			</div>
		</div>
<?php
}
?>
	</div>
	<div class="swiper-pagination swiper-pagination-black"></div>
	<div class="swiper-button-prev swiper-button-black"></div>
	<div class="swiper-button-next swiper-button-black"></div>
</div>
<script src="js/swiper/dist/js/swiper.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
	  zoom: {
		  toggle:true
	  },
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
<?php
}
?>
<?php
if($r1["ptype"]==3){
?>
<?php
	$ACP=1;
	$co=20;
	if($_REQUEST["p"]>0){
		$ACP=mysqli_real_escape_string($con,$_REQUEST["p"]);
	}
	$fr=($ACP-1)*$co;
	$key=urldecode(mysqli_real_escape_string($con,$_GET["key"]));
	if($key!=""){
		$WKE=" AND title LIKE '%".$key."%'";
	}
?>
			<div class="col-md-12">
<?php
$q2=mysqli_query($con,"SELECT * FROM posts WHERE pageid='".$r1["id"]."' ORDER BY id DESC LIMIT $co OFFSET ".$fr);
while($r2=mysqli_fetch_array($q2)){
?>
<a href="?page=posts&id=<?=$r2["id"]?>" class="col-md-4 LIS">
	<div class="col-md-12 LIZ">
		<div class="col-md-5">
			<img src="<?=str_replace("uploads","thumbs",$r2["img"])?>" />
		</div>
		<div class="col-md-7 NOP">
			<?=$r2["title"]?>
		</div>
	</div>
</a>
<?php
}
?>			
			</div>
	<?php
	$q3=mysqli_query($con,"SELECT * FROM posts WHERE id>0 AND pageid='".$r1["id"]."' ".$WKE);
	$tot=ceil(mysqli_num_rows($q3)/$co);
	?>
		<div class="col-md-12">
			<ul class="pagination">
			<?php
			if($tot>1){
			?>
				<li class="first"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$i?>">First</a>
				</li>
				<li class="previous"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=($ACP-1)?>"><i class="fa fa-angle-left"></i></a>
				</li>
			<?php
			}
			?>
			<?php
			for($i=1;$i<=$tot;$i++){
			?>
				<li class="<?=($ACP==$i?"active":"")?>"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$i?>"><?=$i?></a>
				</li>
			<?php	
			}
			?>	
			<?php	
			if($tot<$ACP&&$tot!=0){
			?>	
				<li class="next"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=($ACP+1)?>"><i class="fa fa-angle-right"></i></a>
				</li>
				<li class="last"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$tot?>">Last</a>
				</li>
			<?php	
			}
			?>	
			</ul>
		</div>
<?php
}
?>
</div>