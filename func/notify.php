<?php 
session_start();
if(isset($_SESSION['MGuserID'])){


$q1=mysqli_query($con,"SELECT * FROM scoring WHERE seen=0");
while($r1=mysqli_fetch_array($q1)){
	echo "<br>გაიარა სქორინგი ".$r1["CID"];
}
mysqli_query($con,"UPDATE scoring SET seen=1 WHERE seen=0");
	
}

?>