<?php
if(isset($_SESSION['GuserID'])){
	$T=time();
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
$c=mysqli_real_escape_string($con,$_POST["c"]);
$d=mysqli_real_escape_string($con,$_POST["d"]);
$e=mysqli_real_escape_string($con,$_POST["e"]);
$f=mysqli_real_escape_string($con,$_POST["f"]);
$g=mysqli_real_escape_string($con,$_POST["g"]);
$h=mysqli_real_escape_string($con,$_POST["h"]);
$i=mysqli_real_escape_string($con,$_POST["i"]);
$j=mysqli_real_escape_string($con,$_POST["j"]);
$e=str_replace(" ","-",trim($b));
$e=geotoeng($e);

$q1=mysqli_query($con,"SELECT slug FROM nutritions WHERE id='".$a."'");
$r1=mysqli_fetch_array($q1);
if($r1["slug"]==""){
////sitemap
$content = file_get_contents("/home/admin/domains/newsebi.ge/public_html/sitemap.xml");
$sitemap = simplexml_load_string($content);
$slug=$e;
$myNewUri = $sitemap->addChild("url");
$myNewUri->addChild("loc", "https://www.ikawightlifter.com/nutrition/".$slug);
// $myNewUri->addChild("lastmod", date("DATE_W3C"));
$myNewUri->addChild("changefreq", "daily");
$myNewUri->addChild("priority", "0.51");
$sitemap->asXml("/home/admin/domains/newsebi.ge/public_html/sitemap.xml");
////	
}
mysqli_query($con,"UPDATE nutritions SET title='".$b."',text='".$c."',category='".$f."',img='".$d."',date='".$T."',slug='".$e."',keywords='".$g."',description='".$h."' WHERE id='".$a."'");
echo 1;
}
function geotoeng($word){
	$alpha = array("ა"=>'a',"ბ"=>'b',"ც"=>'c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","-"=>"-","0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9");
	$word=str_replace(" ","-",$word);
	$word = preg_split('//u', $word);
	foreach($word as $key=>$value){
		if(array_key_exists(strtolower($value),$alpha)){
			$newF[$key]=$alpha[strtolower($value)];
		}
	}
	$newW=implode("",$newF);
	return $newW;	
}

?>