<?php
if($r12["plugins"]==1){
?>
<link rel="stylesheet" type="text/css" href="css/plugins.css"/>
<script src="js/plugins.js"></script>
<?php 
$q1=mysqli_query($con,"SELECT * FROM plugins WHERE name='GDP'");
$r1=mysqli_fetch_array($q1);
$q3=mysqli_query($con,"SELECT * FROM plugins WHERE name='NPL'");
$r3=mysqli_fetch_array($q3);
$q2=mysqli_query($con,"SELECT * FROM sectors ORDER BY Id ASC");
$q4=mysqli_query($con,"SELECT * FROM plugins WHERE name='factor'");
$r4=mysqli_fetch_array($q4);
$q5=mysqli_query($con,"SELECT value FROM plugins WHERE name='tmin'");
$r5=mysqli_fetch_array($q5);
$q6=mysqli_query($con,"SELECT value FROM plugins WHERE name='tmax'");
$r6=mysqli_fetch_array($q6);
$q7=mysqli_query($con,"SELECT value FROM plugins WHERE name='pmin'");
$r7=mysqli_fetch_array($q7);
$q8=mysqli_query($con,"SELECT value FROM plugins WHERE name='pmax'");
$r8=mysqli_fetch_array($q8);
$q9=mysqli_query($con,"SELECT value FROM plugins WHERE name='procent'");
$r9=mysqli_fetch_array($q9);
$q10=mysqli_query($con,"SELECT value FROM plugins WHERE name='jarima'");
$r10=mysqli_fetch_array($q10);
$q11=mysqli_query($con,"SELECT value FROM plugins WHERE name='nbgusd'");
$r11=mysqli_fetch_array($q11);
$q12=mysqli_query($con,"SELECT value FROM plugins WHERE name='nbgeur'");
$r12=mysqli_fetch_array($q12);
?>
<div class="MMA">
	<div class="PLA">GDP 
	<input class="A A11"d="GDP"m="1"value="<?=$r1["M1"]?>"c="<?=$r1["Id"]?>" placeholder="1 თვე"/>
	<input class="A A12"d="GDP"m="2"value="<?=$r1["M2"]?>"c="<?=$r1["Id"]?>" placeholder="2 თვე"/>
	<input class="A A13"d="GDP"m="3"value="<?=$r1["M3"]?>"c="<?=$r1["Id"]?>" placeholder="3 თვე"/>
	<input class="A A14"d="GDP"m="4"value="<?=$r1["M4"]?>"c="<?=$r1["Id"]?>" placeholder="4 თვე"/>
	<input class="A A15"d="GDP"m="5"value="<?=$r1["M5"]?>"c="<?=$r1["Id"]?>" placeholder="5 თვე"/>
	<input class="A A16"d="GDP"m="6"value="<?=$r1["M6"]?>"c="<?=$r1["Id"]?>" placeholder="6 თვე"/>
	<input class="A A17"d="GDP"m="7"value="<?=$r1["M7"]?>"c="<?=$r1["Id"]?>" placeholder="7 თვე"/>
	<input class="A A18"d="GDP"m="8"value="<?=$r1["M8"]?>"c="<?=$r1["Id"]?>" placeholder="8 თვე"/>
	<input class="A A19"d="GDP"m="9"value="<?=$r1["M9"]?>"c="<?=$r1["Id"]?>" placeholder="9 თვე"/>
	<input class="A A20"d="GDP"m="10"value="<?=$r1["M10"]?>"c="<?=$r1["Id"]?>" placeholder="10 თვე"/>
	<input class="A A21"d="GDP"m="11"value="<?=$r1["M11"]?>"c="<?=$r1["Id"]?>" placeholder="11 თვე"/>
	<input class="A A22"d="GDP"m="12"value="<?=$r1["M12"]?>"c="<?=$r1["Id"]?>" placeholder="12 თვე"/> =
	<input class="A A23"d="GDP"value="<?=$r1["average"]?>"c="<?=$r1["Id"]?>" placeholder="საშუალო"/>
	</div>
	<div class="PLA">NPL
	<input class="A A21"d="NPL"m="1"value="<?=$r3["M1"]?>"c="<?=$r3["Id"]?>" placeholder="1 თვე"/>
	<input class="A A22"d="NPL"m="2"value="<?=$r3["M2"]?>"c="<?=$r3["Id"]?>" placeholder="2 თვე"/>
	<input class="A A23"d="NPL"m="3"value="<?=$r3["M3"]?>"c="<?=$r3["Id"]?>" placeholder="3 თვე"/>
	<input class="A A24"d="NPL"m="4"value="<?=$r3["M4"]?>"c="<?=$r3["Id"]?>" placeholder="4 თვე"/>
	<input class="A A25"d="NPL"m="5"value="<?=$r3["M5"]?>"c="<?=$r3["Id"]?>" placeholder="5 თვე"/>
	<input class="A A26"d="NPL"m="6"value="<?=$r3["M6"]?>"c="<?=$r3["Id"]?>" placeholder="6 თვე"/>
	<input class="A A27"d="NPL"m="7"value="<?=$r3["M7"]?>"c="<?=$r3["Id"]?>" placeholder="7 თვე"/>
	<input class="A A28"d="NPL"m="8"value="<?=$r3["M8"]?>"c="<?=$r3["Id"]?>" placeholder="8 თვე"/>
	<input class="A A29"d="NPL"m="9"value="<?=$r3["M9"]?>"c="<?=$r3["Id"]?>" placeholder="9 თვე"/>
	<input class="A A30"d="NPL"m="10"value="<?=$r3["M10"]?>"c="<?=$r3["Id"]?>" placeholder="10 თვე"/>
	<input class="A A31"d="NPL"m="11"value="<?=$r3["M11"]?>"c="<?=$r3["Id"]?>" placeholder="11 თვე"/>
	<input class="A A32"d="NPL"m="12"value="<?=$r3["M12"]?>"c="<?=$r3["Id"]?>" placeholder="12 თვე"/> =
	<input class="A A33"d="NPL"value="<?=$r3["average"]?>"c="<?=$r3["Id"]?>" placeholder="საშუალო"/>
	</div>
</div>
<div class="MMA">
	<div class="PLA">NPL სექტორის მიხედვით <input class="B B1"d="name" placeholder="კატეგორია"/>
		<input style="display:none;"class="B B2"d="factor" placeholder="factor"/>
		<input class="B B3"d="NPL" placeholder="NPL"/>
		<input class="ADD" type="button" value="დამატება"/>
	</div>
<?php 
while($r2=mysqli_fetch_array($q2)){
?>
	<div class="PLA">კატეგორია / კოეფიციენტი <input class="C C1"d="name"value="<?=$r2["name"]?>"c="<?=$r2["Id"]?>"  placeholder="კატეგორია"/>
		<input style="display:none;"class="C C2"d="factor"value="<?=$r2["factor"]?>"c="<?=$r2["Id"]?>" placeholder="factor"/>
		<input class="C C2"d="SNPL"value="<?=$r2["NPL"]?>"c="<?=$r2["Id"]?>" placeholder="NPL"/> % 
		<div class="DLT" d="<?=$r2["Id"]?>">წაშლა</div>
	</div>
<?	
}
?>
</div>
<?php
}
?>