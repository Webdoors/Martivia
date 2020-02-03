<?php
session_start();
if(isset($_SESSION['MGuserID'])){
$q12=mysqli_query($con,"SELECT permissions,matrix FROM permissions WHERE adminid='".$_SESSION['MGuserID']."'");
$r12=mysqli_fetch_array($q12);
$a=mysqli_real_escape_string($con,$_POST["a"]);
$q1=mysqli_query($con,"SELECT * FROM scoring WHERE Id='".$a."'");
$r1=mysqli_fetch_array($q1);
$q2=mysqli_query($con,"SELECT * FROM sectors WHERE Id='".$r1["csector"]."' ");
$r2=mysqli_fetch_array($q2);
?>
<?php
if($r12["matrix"]==1){
?>	
<table class="t1 table table-striped table-bordered dataTable">
		
		<thead>
		<tr>
			<th>ფაქტორები</th>
			<th>მნიშვნელობები</th>
		</tr>
		</thead>
		<tbody>
<?php
echo "<tr><td>gdp</td><td>".$r1["gdp"]."</td></tr>";
echo "<tr><td>npl</td><td>".$r1["npl"]."</td></tr>";
echo "<tr><td>creditinfoco</td><td>".$r1["creditinfoco"]."</td></tr>";
echo "<tr><td>qcashloan</td><td>".$r1["qcashloan"]."</td></tr>";
echo "<tr><td>სფერო</td><td>".$r2["name"]." ".$r2["NPL"]."</td></tr>";
echo "<tr><td>companyold</td><td>".$r1["companyold"]." წელი</td></tr>";
echo "<tr><td>profit</td><td>".$r1["profit"]."</td></tr>";
echo "<tr><td>profityear</td><td>".$r1["profityear"]."</td></tr>";
echo "<tr><td>vatrevenue</td><td>".$r1["vatrevenue"]."</td></tr>";
echo "<tr><td>months</td><td>".$r1["months"]."</td></tr>";
echo "<tr><td>getincome</td><td>".$r1["getincome"]."</td></tr>";
echo "<tr><td>paidcash</td><td>".$r1["paidcash"]."</td></tr>";
echo "<tr><td>paidcash4month</td><td>".$r1["paidcash4"]."</td></tr>";
echo "<tr><td>taxpayable</td><td>".$r1["taxpayable"]."</td></tr>";
echo "<tr><td>creditinfoind</td><td>".$r1["creditinfoind"]."</td></tr>";
echo "<tr><td>yadaga</td><td>".($r1["yadaga"]==1?"კი":"არა")."</td></tr>";
echo "<tr><td>standartpayment</td><td>".$r1["standartpayment"]."</td></tr>";
echo "<tr><td>tsyaro</td><td>".$r1["tsyaro"]."</td></tr>";
echo "<tr><td>score</td><td>".$r1["score"]."</td></tr>";
echo "<tr><td>tanxa</td><td>".$r1["tanxa"]."</td></tr>";
echo "<tr><td>status</td><td>".($r1["status"]==1?"დაუმტკიცდა":"უარყოფილი")."</td></tr>";
?>
		</tbody>
		</table>
<?php
}else{
?>	
<table class="t1 table table-striped table-bordered dataTable">
		
		<thead>
		<tr>
			<th>ფაქტორები</th>
			<th>მნიშვნელობები</th>
		</tr>
		</thead>
		<tbody>
<?php
echo "<tr><td>1</td><td>".$r1["gdp"]."</td></tr>";
echo "<tr><td>2</td><td>".$r1["npl"]."</td></tr>";
echo "<tr><td>3</td><td>".$r1["creditinfoco"]."</td></tr>";
echo "<tr><td>4</td><td>".$r1["qcashloan"]."</td></tr>";
echo "<tr><td>5</td><td>".$r2["name"]." ".$r2["NPL"]."</td></tr>";
echo "<tr><td>6</td><td>".$r1["companyold"]." წელი</td></tr>";
echo "<tr><td>7</td><td>".$r1["profit"]."</td></tr>";
echo "<tr><td>8</td><td>".$r1["profityear"]."</td></tr>";
echo "<tr><td>9</td><td>".$r1["vatrevenue"]."</td></tr>";
echo "<tr><td>10</td><td>".$r1["months"]."</td></tr>";
echo "<tr><td>11</td><td>".$r1["getincome"]."</td></tr>";
echo "<tr><td>12</td><td>".$r1["paidcash"]."</td></tr>";
echo "<tr><td>13</td><td>".$r1["paidcash4"]."</td></tr>";
echo "<tr><td>14</td><td>".$r1["taxpayable"]."</td></tr>";
echo "<tr><td>15</td><td>".$r1["creditinfoind"]."</td></tr>";
echo "<tr><td>16</td><td>".($r1["yadaga"]==1?"კი":"არა")."</td></tr>";
echo "<tr><td>17</td><td>".$r1["standartpayment"]."</td></tr>";
echo "<tr><td>18</td><td>".$r1["tsyaro"]."</td></tr>";
echo "<tr><td>19</td><td>".$r1["score"]."</td></tr>";
echo "<tr><td>20</td><td>".$r1["tanxa"]."</td></tr>";
echo "<tr><td>21</td><td>".($r1["status"]==1?"დაუმტკიცდა":"უარყოფილი")."</td></tr>";
?>
		</tbody>
		</table>
<?php
}
?>		
<?php
}
?>