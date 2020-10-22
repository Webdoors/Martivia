<?php
if(isset($_SESSION['GuserID'])){
	$T=time();
$a=(int)$_POST["a"];
$b=mysqli_real_escape_string($con,$_POST["b"]);
$c=mysqli_real_escape_string($con,$_POST["c"]);
$d=mysqli_real_escape_string($con,$_POST["d"]);
$e=mysqli_real_escape_string($con,$_POST["e"]);
$g=mysqli_real_escape_string($con,$_POST["g"]);
$e=str_replace(" ","-",$b);
$e=geotoeng($e);
$f=(int)$_POST['f'];
$h=(int)$_POST['h'];
$i=(int)$_POST['i'];
$j=mysqli_real_escape_string($con,$_POST["j"]);
$k=mysqli_real_escape_string($con,$_POST["k"]);
$l=mysqli_real_escape_string($con,$_POST["l"]);
$m=mysqli_real_escape_string($con,$_POST["m"]);
$n=mysqli_real_escape_string($con,$_POST["n"]);
$o=mysqli_real_escape_string($con,$_POST["o"]);
$p=mysqli_real_escape_string($con,$_POST["p"]);
$r=(int)$_POST["r"];
//echo $f.'--';
mysqli_query($con,"UPDATE news SET title='".$b."',text='".$c."', img='".$d."',date='".$T."',slug='".$e."',  active='".$i."', author='".$r."' WHERE id='".$a."' ");

 mysqli_query($con,"UPDATE  langs SET column_value='$k' WHERE table_name='news' AND table_id='$a' AND table_column='title' AND short_name='ru' ");
 mysqli_query($con,"UPDATE  langs SET column_value='$j' WHERE table_name='news' AND table_id='$a' AND table_column='title' AND short_name='en' ");
 mysqli_query($con,"UPDATE  langs SET column_value='$m' WHERE table_name='news' AND table_id='$a' AND table_column='text' AND short_name='ru' ");
 mysqli_query($con,"UPDATE  langs SET column_value='$l' WHERE table_name='news' AND table_id='$a' AND table_column='text' AND short_name='en' ");
 mysqli_query($con,"UPDATE  seo SET column_value='$n' WHERE page_name='article' AND page_id='$a' AND page_column='description'  ");
 mysqli_query($con,"UPDATE  langs SET column_value='$p' WHERE table_name='news' AND table_id='$a' AND table_column='description' AND short_name='ru' ");
 mysqli_query($con,"UPDATE  langs SET column_value='$o' WHERE table_name='news' AND table_id='$a' AND table_column='description' AND short_name='en' ");
 
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