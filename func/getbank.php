<?php
	session_write_close();
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);

	$url = 'http://18.185.34.70/python_auto/new/banks_auto/';
	$ch = curl_init();
	$params = array('user' => $b,
	'pass' => $c,
	'days' => '730',
	'bank' => $a,
	'cid' => $d
	);	
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 240);

	curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
    $curlresult =  trim(json_decode(curl_exec($ch),JSON_UNESCAPED_UNICODE));
	file_put_contents("/var/www/qcash.ge/merchant/admin/func/getbank.log",$curlresult,FILE_APPEND);
	$error_message = "incorrect username or password";
	$error_message2 = "incorrect bank";
	$error_message3 = "empty";
	$error_message4 = "something went wrong";
	$error_message5 = "password expired";
	$error_message6 = "error";
		curl_close($ch);
	// var_dump($params);
		 // echo $curlresult;
	if (stripos(trim($curlresult), $error_message) !== false){
		echo 2;
	}elseif(stripos(trim($curlresult), $error_message2) !== false){
		echo 3;
	}elseif(stripos(trim($curlresult), $error_message3)!== false){
		echo 4;
	}elseif(stripos(trim($curlresult), $error_message4)!== false){
		echo 5;
	}elseif(stripos(trim($curlresult), $error_message5)!== false){
		echo 6;
	}elseif(trim($curlresult)==""||stripos(trim($curlresult), $error_message6) !== false){
		echo 7;
	}elseif(trim($curlresult)==""){
		echo 3;		
	}else{
		//$curlresult ="http://34.247.135.96/python_auto/Export_Files/BOG/2018/September/24/08_45_36.994851/results_to_php.txt "; 
		// echo $curlresult;

		// echo stripos($curlresult,"C:/xampp/htdocs");
		$str=str_replace("C:/xampp/htdocs","http://18.196.102.181/",$curlresult);
		$str="http://18.185.34.70/".substr($curlresult,16);
		$str=str_replace('\\', '/',$str);

		$json=file_get_contents(removeBOM(stripcslashes(trim($str))));
		 var_dump($json);
		// var_dump(removeBOM(stripcslashes(trim($str))));
		// var_dump(trim($str));
		//$json=str_replace('\\','/',"http://34.247.135.96/python_auto/Export_Files\BOG\2018\September\19\12_05_13.403880\results_to_php.txt");
		// echo "<pre>";
		// print_r(json_decode(removeBOM(stripcslashes(trim($json))),true));
		// echo "</pre>";

		$sta=removeBOM(stripcslashes(trim($json)));
		$arr=json_decode($sta,true);
		$valid=0;
		try {
			foreach($arr as $key=>$value){
				if($key=="მთლიანი ჯამები"){
					$valid=1;
				}
			}
		}

		//catch exception
		catch(Throwable $e) {
			echo 4;
		}


		if(trim($sta)!=""&&$valid==1){
			mysqli_query($con,"INSERT INTO banks SET bank='".$a."',state='".$sta."',date='".time()."',cid='".$d."'");
			echo 1;					
		}

	}
	
function removeBOM($data) {
	if (0 === strpos(bin2hex($data), 'efbbbf')) {
	   return substr($data, 3);
	}
	return $data;
}	