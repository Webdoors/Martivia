<?php
$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=mysqli_real_escape_string($con,$_POST['c']);
$d=mysqli_real_escape_string($con,$_POST['d']);
$e=mysqli_real_escape_string($con,$_POST['e']);
$g=mysqli_real_escape_string($con,$_POST['g']);
$f=mysqli_real_escape_string($con,$_POST['f']);
$h=mysqli_real_escape_string($con,$_POST['h']);
$i=mysqli_real_escape_string($con,$_POST['i']);
$j=mysqli_real_escape_string($con,$_POST['j']);
$k=mysqli_real_escape_string($con,$_POST['k']);
$l=mysqli_real_escape_string($con,$_POST['l']);
$m=mysqli_real_escape_string($con,$_POST['m']);
$d=(int)$_POST['d'];
mysqli_query($con,"UPDATE gamokitxvebi SET title='$a',engtitle='$b',rutitle='$c',pirveli='$e',
                   engpirveli='$g', rupirveli='$f', meore='$h', engmeore='$i', rumeore='$j', 
				   mesame='$k', engmesame='$l', rumesame='$m'  WHERE id='$d' ");
echo 1;

?>