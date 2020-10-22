<?php
include("../config.php");
include("../db.php");
$a="region";
$aa=mysqli_query($con, "SELECT * FROM categories");
while($raa=mysqli_fetch_assoc($aa))
{
	echo $raa['name'] . "<br/>";
}
// mysqli_query($con, "INSERT INTO categories (name) VALUES ('$a')");
echo 1;
phpinfo();
?>