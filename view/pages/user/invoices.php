<div class="col-md-12">
	<div class="col-md-12">
	<br>
		<label>ინვოისები თვეების მიხედვით:</label>
	</div>
	<div class="col-md-12 LIS H NOP">
		<div class="D2" style="width:150px;">წელი</div>
		<div class="D2" style="width:150px;">თვე</div>
		<div class="D2" style="width:250px;">ჩატარებული სქორების რაოდენობა</div>
		<div class="D2" style="width:150px;">გადასახდელი თანხა</div>
		<div class="D3" style="width:120px;">ინვოისის ბეჭდვა</div>
	</div>
<?php
$Guid=mysqli_real_escape_string($con,$_GET["id"]);
$T=time();
$Y=date("m",$T)+0;
$Year=date("Y",$T);
$q2=mysqli_query($con,"SELECT * FROM scoring WHERE muser='".$Guid."' LIMIT 1");
$r2=mysqli_fetch_array($q2);
$FM=date("m",$r2["date"])+0;
$q1=mysqli_query($con,"SELECT * FROM scoring WHERE muser='".$Guid."'");
$q500=mysqli_query($con,"SELECT * FROM plugins WHERE name='nbgusd'");
$r500=mysqli_fetch_array($q500);

//echo "<br>".$FM." ".$Y;

for($i=1;$i<=12;$i++){

	//$m=($Y+1)-$i;
	$m=($Y)-$i;
	$date1 = strtotime(($m+1)."/1/".$Year);
	$date2 = strtotime(($m)."/1/".$Year);
$q20=mysqli_query($con,"SELECT * FROM scoring WHERE checked=1 AND muser='".$Guid."' AND date<='".$date1."' AND date>='".$date2."'");	
$raod=mysqli_num_rows($q20);

	$monthNum  = $m;
	$dateObj   = DateTime::createFromFormat('!m', $monthNum);
	$monthName = $dateObj->format('F'); // March
	if($raod!=0){
if($monthName=="September"&&$Guid==13&&$Year=="2017"){
	$raod=$raod-4;
}		
		if($raod<=100){
			$amount=1000;
		}elseif($raod>100&&$raod<=250){
			$amount=2000;		
		}elseif($raod>250&&$raod<=500){
			$amount=$raod*8;		
		}elseif($raod>500&&$raod<=1000){
			$amount=$raod*7;		
		}elseif($raod>1000){
			$amount=$raod*5;		
		}
?>
	<div class="col-md-12 LIS H NOP">
		<div class="D2" style="width:150px;"><?=$Year?></div>
		<div class="D2" style="width:150px;"><?=$monthName?></div>
		<div class="D2" style="width:250px;"><?=$raod?></div>
		<div class="D2" style="width:150px;"><?=number_format($amount*$r500["value"],2)." ლარი"?></div>
		<div class="D3" style="width:120px;"><a href="func/invoice.php?m=<?=$Guid?>&year=<?=$Year?>&month=<?=$monthNum?>&amount=<?=($amount)?>&raod=<?=$raod?>">PDF</a></div>
	</div>
<?php
		}
	}
?>
</div>