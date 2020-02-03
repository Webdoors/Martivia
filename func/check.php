<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	mysqli_query($con,"UPDATE scoring SET checked='".$a."' WHERE Id='".$b."'");
	$q1=mysqli_query($con,"SELECT * FROM scoring WHERE Id='".$b."'");
	$r1=mysqli_fetch_array($q1);
	$q2=mysqli_query($con,"SELECT * FROM merchants WHERE id='".$r1["muser"]."'");
	$r2=mysqli_fetch_array($q2);
	$url = $r2["successlink"];
	$amount=$r1["tanxa"];
	$status="Daumtkicda";

	$amunt=0;
	$status="Rejected";
	$ch = curl_init();
	$params = array('scoringid'=>$r1["Id"],
					'date' => date("m/d/Y",$r1["date"]),
					'cid' => $r1["CID"],	
					'ctel' => $r1["ctel"],	
					'amount' => $amount,	
					'status' => $status
	);
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
	$curlresult = curl_exec($ch);
	curl_close($ch);		
	
	
	echo 1;
}
?>