<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST['a']);
	$b=mysqli_real_escape_string($con,$_POST['b']);
	$c=mysqli_real_escape_string($con,$_POST['c']);
	$d=mysqli_real_escape_string($con,$_POST['d']);
	$e=mysqli_real_escape_string($con,$_POST['e']);
	$g=mysqli_real_escape_string($con,$_POST['g']);
	$f=mysqli_real_escape_string($con,$_POST['f']);
	echo $a .'--';
	echo $b .'--';
	echo $c .'--';
	echo $d .'--';
	echo $e .'--';
	echo $g .'--';
	echo $f .'--';
	$cc=mysqli_query($con,"SELECT * FROM contact");
	if(mysqli_num_rows($cc)>0)
	{
		mysqli_query($con,"UPDATE contact SET addres='$a',engaddres='$b',ruaddres='$c', mail='$d', dro='$e', engdro='$g', rudro='$f' ");
		echo 1;
	}
	else
	{
		mysqli_query($con,"INSERT INTO contact (addres,engaddres,ruaddres,mail,dro,engdro,rudro) VALUES ('".$a."','".$b."','".$c."','".$d."','".$e."','".$g."','".$f."') ");
			
	echo 1;
	}

}
	?>