<?php
if(isset($_SESSION['user'])){
	$user_id=intval($_SESSION['user']['id']);
	$q10=mysqli_query($con,"SELECT id,mail FROM ate_user WHERE id='".$user_id."'");
	$r10=mysqli_fetch_array($q10);
}
?>
<?php 
$colid=mysqli_real_escape_string($con,$_GET["collection"]);
$category=mysqli_real_escape_string($con,$_GET["category"]);
$pid=mysqli_real_escape_string($con,$_GET["id"]);
$sale=mysqli_real_escape_string($con,$_GET["sale"]);
$q1=mysqli_query($con,"SELECT name FROM ate_collection WHERE id='".$colid."'");
$r1=mysqli_fetch_array($q1);
$q2=mysqli_query($con,"SELECT name FROM ate_category WHERE id='".$category."'");
$r2=mysqli_fetch_array($q2);
$colname=$r1["name"];
$catname=$r2["name"];
$cat="";
$col="";
if($category>0){
	$cat=" AND `t1`.`category`='".$category."'";
	$catget="&category=".$category;
}
if($colid>0){
	$col=" AND `t1`.`collection`='".$colid."'";
	$colget="&collection=".$colid;
}
if($sale==""||$sale=="0"){
	$sale=0;
	$usale=1;
}
if($sale=="1"){
	$sale=1;
	$usale=0;
}
?>
<!doctype html>
<html xmlns="https://www.w3.org/2012/xhtml" lang="ka">
	<head>
		<meta name="google-site-verification" content="<meta name="google-site-verification" content="g4DimXsv0vBSkzQSl3i7eQDlsgdo3u4cuCWgVdBTY7c" />
		<link rel="icon"type="image/x-icon"href="img/slogo.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <meta http-equiv="Access-Control-Allow-Origin" content="*"/>
		<title>Martivia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-language" content="ka">
		<meta name="Author" content="Irakli Shalamberidze">
		<meta property="og:title" content="Atelierkikala - Fashion House" />
		<meta property="og:description" content="ატელიერ კიკალა მოდის სახლი" />
		<meta name="keywords" content="ბიზნეს,საკრედიტო,ხაზი,რეგისტრაცია,მოთხოვნა,ლიმიტის,დამტკიცება,სესხი,ტრანში"/>
		<meta name="description" content="ონლაინ ბიზნეს შეფასება 24/7" />
		<meta name="author" content="QuickCash LLC" />
		<meta name="copyright" content="&copy;2016 atelierkikala.com" />
		<meta name="robots" content="all" />
		<meta name="revisit-after" content="1 days" />
		<link rel="canonical" href="https://atelierkikala.com/"/>
		<meta property="og:image" content="https://atelierkikala.com/img/unnamed.jpg" />
		<meta property="og:type" content="website" />
		<meta property="fb:app_id" content="248744675578367" />
		<meta property="og:url" content="http://kikalastudio.com/" />
		<link rel="stylesheet" type="text/css" href="http://kikalastudio.com/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css?v=12"/>
		<link rel="stylesheet" type="text/css" href="http://kikalastudio.com/css/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="https://atelierkikala.com/supr/css/plugins.css">
		<script src="https://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://kikalastudio.com/js/jquery-migrate-1.2.1.js"></script>
	</head>
	<body>
	<div class="FHE">
		<div class="cont" onclick="MF1(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
		<div class="LOG"><a href="/">Kikala Studio</a></div>
		<div class="HLI">	
			<a class="L j2 <?=$p==""?"ACT":""?>" href="/">Home</a>
			<div class="L j2 <?=$p=="pricelist"?"ACT":""?>">Categories<i class='fa fa-sort-down'></i>

<?
	$q1=mysqli_query($con,"SELECT * FROM treecat ");
	$r1=mysqli_fetch_array($q1);
	$tree=json_decode($r1["tree"],true);

?>
<div class="dd" id="nestable">


<?php
lis($tree,$con);
	function lis($tree,$con){
?>
<ol class="dd-list">
<?php		
		for($i=0;$i<count($tree);$i++){
			$q2=mysqli_query($con,"SELECT * FROM categories WHERE id='".$tree[$i]["id"]."'");
			$r2=mysqli_fetch_array($q2);		
			$q3=mysqli_query($con,"SELECT * FROM pages WHERE category='".$r2["id"]."' ORDER BY id DESC LIMIT 1");
			$r3=mysqli_fetch_array($q3);
?>
	<li class="dd-item" data-id="<?=$tree[$i]["id"]?>">
	<div class="dd-handle"><a href="?page=page&id=<?=$r3["id"]?>"><?=$r2["name"]?></a></div>

<?php
			if(array_key_exists("children",$tree[$i])){	
				lis($tree[$i]["children"],$con);
			}
?>
	</li>
<?php			
				
			
		}	
?>
</ol>
<?php		
	}
	?>
</div>

			</div>
<?php
$q4=mysqli_query($con,"SELECT * FROM pages WHERE menu=1");
while($r4=mysqli_fetch_array($q4)){
?>
			<a class="L j2 <?=$p=="page"&&$pid==$r4["id"]?"ACT":""?>" href="?page=page&id=<?=$r4["id"]?>"><?=$r4["titlegeo"]?></a>
<?php
}
?>
			<a class="L j2 <?=$p=="contact"?"ACT":""?>" href="?page=contact">Contact</a>
		</div>
		<div class="TEL"><a href="tel:+995322142178">Call Now : +995322142178</a></div>		
	</div>