<?php
if(isset($_SESSION['GuserID'])){
	$T=time();
$a=(int)$_POST["a"];
$b=mysqli_real_escape_string($con,$_POST["b"]);
$c=mysqli_real_escape_string($con,$_POST["c"]);
$d=mysqli_real_escape_string($con,$_POST["d"]);
$e=mysqli_real_escape_string($con,$_POST["e"]);
$g=(int)$_POST['g'];
$e=str_replace(" ","-",$b);
$e=geotoeng($e);
$i=mysqli_real_escape_string($con,$_POST["i"]);
$f=mysqli_real_escape_string($con,$_POST["f"]);
$h=(int)$_POST['h'];
$j=(int)$_POST['j'];
//echo $f.'--';
mysqli_query($con,"UPDATE articles SET title='".$b."',text='".$c."', img='".$d."',date='".$T."',slug='".$e."',  active='".$g."', category='".$h."', short_text='".$i."', author='".$j."'  WHERE id='".$a."' ");

 
 mysqli_query($con,"UPDATE  seo SET column_value='$f' WHERE page_name='nutrition' AND table_name='articles'  AND table_id='$a' AND table_column='description'  ");

 
echo 1;



}
function geotoeng($word){
	$alpha = array("ა"=>'a',"ბ"=>'b','c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","-"=>"-","0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9");
	$word=str_replace(" ","-",$word);
	$word = preg_split('//u', $word);
	foreach($word as $key=>$value){
		if(array_key_exists($value,$alpha)){
			$newF[$key]=$alpha[$value];
		}
	}
	$newW=implode("",$newF);
	return $newW;	
}
?>