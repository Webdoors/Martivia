<?php
$con = mysqli_connect("localhost","admin_merchant","#Merchant#123","admin_merchant");
mysqli_set_charset($con,"utf8");
$year=mysqli_real_escape_string($con,$_REQUEST["year"]);
$m=mysqli_real_escape_string($con,$_REQUEST["month"]);
$muser=mysqli_real_escape_string($con,$_REQUEST["m"]);
$q1=mysqli_query($con,"SELECT * FROM merchants WHERE id='".$muser."'");
$r1=mysqli_fetch_array($q1);
$q500=mysqli_query($con,"SELECT * FROM plugins WHERE name='nbgusd'");
$r500=mysqli_fetch_array($q500);
	$dateObj   = DateTime::createFromFormat('!m', $m);
	$monthName = $dateObj->format('F');
	$k=array(
	"August"=>"აგვისტოს",
	"September"=>"სექტემბრის",
	"October"=>"ოქტომბრის",
	"November"=>"ნოემბრის",
	"December"=>"დეკემბრის",
	"January"=>"იანვრის",
	"February"=>"თებერვლის",
	"March"=>"მარტის",
	"April"=>"აპრილის",
	"May"=>"მაისის",
	"June"=>"ივნისის",
	"July"=>"ივლისის"
	);
$amount=mysqli_real_escape_string($con,$_REQUEST["amount"]);
$raod=mysqli_real_escape_string($con,$_REQUEST["raod"]);
	$html = '
	<div class="BIM"><img src="https://qcash.ge/img/logo.png"  /></div> <div class="BHT">  “Quick Cash” LLC</div>
	<div class="BTA">
							
		
		</div>
		<div class="BTA1">

		</div>
	<div class="BTA2">
					
თარიღი: 1/'.($m+1).'/'.$year.'
			
		
		</div>
	<div class="BTA3">

ინვოისის ნომერი: '.$muser.$year.$m.'				
		
		</div>
	<div class="BTA4">
					
			გადამხდელი: 
			</br>
			</br>

<br><br>'.$r1["legname"].' </br></br>

<br><br>საიდენტიფიკაციო კოდი: '.$r1["legnum"].'  </br>					
		
		</div>
	<div class="BTA5">
დასახელება			
		
		</div>
		<div class="BTA6">
		
ღირებულება



		</div>
	<div class="BTA7">' .$year.' წლის 
	'.$k[$monthName].' თვის მომსახურების ღირებულება (	 '.$raod.' ცალი )					

		</div>
		<div class="BTA8">
'.number_format($amount*$r500["value"],2).'  ლარი 
		</div>

	<div class="BTA9">
<strong>რეკვიზიტები</strong>

<br><br>ბანკი: “ სს „თი ბი სი ბანკი“
<br>ბანკის კოდი: TBCBGE22
<br>მიმღების დასახელება: შპს “ქუიქქეშ“
<br>საიდენტიფიკაციო კოდი: 404504050
<br>ა/ა: GE39TB7480036020100001

		</div>
		';	


	//==============================================================
	//==============================================================
	//==============================================================

	include("../../../mpdf/mpdf.php");

	$mpdf=new mPDF('utf-8'); 

	$mpdf->SetDisplayMode('fullpage');

	// LOAD a stylesheet
	$stylesheet = file_get_contents('../../../mpdf/examples/big.css');
	$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

	$mpdf->WriteHTML($html);

	$mpdf->Output();

	exit;
	//==============================================================
	//==============================================================
	//==============================================================*/

?>