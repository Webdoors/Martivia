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
$gm=mysqli_query($con,"SELECT * FROM gamokitxvebi WHERE title='$a'");
if(mysqli_num_rows($gm)==0)
{

mysqli_query($con,"INSERT INTO gamokitxvebi (title,engtitle,rutitle,pirveli,meore,mesame,engpirveli,engmeore,engmesame,
                   rupirveli,rumeore,rumesame) VALUES ('$a','$b','$c','$d','$e','$g','$f','$h','$i','$j','$k','$l')");

}
else
{
	?>
	<script>
	alert('ეს კითხვა უკვე არსებობს');
	</script>
	<?php
}

?>