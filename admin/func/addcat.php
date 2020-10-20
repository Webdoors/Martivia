<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	mysqli_query($con,"INSERT INTO categories SET name='$a'");
	$id=mysqli_insert_id($con);
?>
<li class="dd-item" data-id="<?=$id?>">
	<div class="dd-handle"><?=$id?></div>
</li>
<?php
}
?>