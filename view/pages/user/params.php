<?php
$a=mysqli_real_escape_string($con,$_REQUEST["id"]);
$q1=mysqli_query($con,"SELECT * FROM matrixpars WHERE merchantid='".$a."'");
$r1=mysqli_fetch_array($q1);
?>
<br>
<input type="hidden" class="MID" value="<?=$a?>"/>
<table class="t1 table table-striped table-bordered dataTable">
		
		<thead>
		<tr>
			<th>პარამეტრები</th>
			<th>მნიშვნელობები</th>
		</tr>
		</thead>
		<tbody>
<?php
echo "<tr><td>GDP>=0.03</td><td><input d='A1' class='form-control PRM' value='".$r1["A1"]."'/></td></tr>";
echo "<tr><td>GDP>0.01GDP<0.03</td><td><input d='A2' class='form-control PRM' value='".$r1["A2"]."'/></td></tr>";
echo "<tr><td>GDP<=0.01</td><td><input d='A3' class='form-control PRM' value='".$r1["A3"]."'/></td></tr>";
echo "<tr><td>NPL>=0.05</td><td><input d='A4' class='form-control PRM' value='".$r1["A4"]."'/></td></tr>";
echo "<tr><td>NPL>0.03NPL<0.05</td><td><input d='A5' class='form-control PRM' value='".$r1["A5"]."'/></td></tr>";
echo "<tr><td>NPL<=0.03</td><td><input d='A6' class='form-control PRM' value='".$r1["A6"]."'/></td></tr>";
echo "<tr><td>crinfopositive</td><td><input d='A7' class='form-control PRM' value='".$r1["A7"]."'/></td></tr>";
echo "<tr><td>crinfocurneg</td><td><input d='A8' class='form-control PRM' value='".$r1["A8"]."'/></td></tr>";
echo "<tr><td>crinfohisneg</td><td><input d='A9' class='form-control PRM' value='".$r1["A9"]."'/></td></tr>";
echo "<tr><td>inpl4factor</td><td><input d='A10' class='form-control PRM' value='".$r1["A10"]."'/></td></tr>";
echo "<tr><td>QCASHLOAN=0</td><td><input d='A11' class='form-control PRM' value='".$r1["A11"]."'/></td></tr>";
echo "<tr><td>QCASHLOAN=1</td><td><input d='A12' class='form-control PRM' value='".$r1["A12"]."'/></td></tr>";
echo "<tr><td>QCASHLOAN=2</td><td><input d='A38' class='form-control PRM' value='".$r1["A38"]."'/></td></tr>";
echo "<tr><td>QCASHLOAN>2</td><td><input d='A39' class='form-control PRM' value='".$r1["A39"]."'/></td></tr>";
echo "<tr><td>COMPANYOLD<=1</td><td><input d='A13' class='form-control PRM' value='".$r1["A13"]."'/></td></tr>";
echo "<tr><td>COMPANYOLD>1COMPANYOLD<3</td><td><input d='A37' class='form-control PRM' value='".$r1["A37"]."'/></td></tr>";
echo "<tr><td>COMPANYOLD>=3</td><td><input d='A14' class='form-control PRM' value='".$r1["A14"]."'/></td></tr>";
echo "<tr><td>CASHREVENUESALES<0.5</td><td><input d='A15' class='form-control PRM' value='".$r1["A15"]."'/></td></tr>";
echo "<tr><td>CASHREVENUESALES>=0.5</td><td><input d='A16' class='form-control PRM' value='".$r1["A16"]."'/></td></tr>";
echo "<tr><td>TAXPAYABLE<=0</td><td><input d='A17' class='form-control PRM' value='".$r1["A17"]."'/></td></tr>";
echo "<tr><td>TAXPAYABLE<1000</td><td><input d='A18' class='form-control PRM' value='".$r1["A18"]."'/></td></tr>";
echo "<tr><td>TAXPAYABLE>1000</td><td><input d='A19' class='form-control PRM' value='".$r1["A19"]."'/></td></tr>";
echo "<tr><td>YADAGAGIR=1</td><td><input d='A20' class='form-control PRM' value='".$r1["A20"]."'/></td></tr>";
echo "<tr><td>YADAGAGIR=0</td><td><input d='A21' class='form-control PRM' value='".$r1["A21"]."'/></td></tr>";
echo "<tr><td>fcrinfopos</td><td><input d='A22' class='form-control PRM' value='".$r1["A22"]."'/></td></tr>";
echo "<tr><td>fcrinfocurneg</td><td><input d='A23' class='form-control PRM' value='".$r1["A23"]."'/></td></tr>";
echo "<tr><td>fcrinfohisneg</td><td><input d='A24' class='form-control PRM' value='".$r1["A24"]."'/></td></tr>";
echo "<tr><td>PAYMENTREVENUE<0.1</td><td><input d='A25' class='form-control PRM' value='".$r1["A25"]."'/></td></tr>";
echo "<tr><td>PAYREV>=0.1PAYREV<0.3</td><td><input d='A26' class='form-control PRM' value='".$r1["A26"]."'/></td></tr>";
echo "<tr><td>PAYREV>=0.3PAYREV<0.5</td><td><input d='A27' class='form-control PRM' value='".$r1["A27"]."'/></td></tr>";
echo "<tr><td>PAYREV>0.5</td><td><input d='A28' class='form-control PRM' value='".$r1["A28"]."'/></td></tr>";
echo "<tr><td>PROFITABLE>0</td><td><input d='A29' class='form-control PRM' value='".$r1["A29"]."'/></td></tr>";
echo "<tr><td>PROFITABLE<=0</td><td><input d='A30' class='form-control PRM' value='".$r1["A30"]."'/></td></tr>";
echo "<tr><td>floor</td><td><input d='A31' class='form-control PRM' value='".$r1["A31"]."'/></td></tr>";
echo "<tr><td>tmin</td><td><input d='A32' class='form-control PRM' value='".$r1["A32"]."'/></td></tr>";
echo "<tr><td>tmax</td><td><input d='A33' class='form-control PRM' value='".$r1["A33"]."'/></td></tr>";
echo "<tr><td>pmin</td><td><input d='A34' class='form-control PRM' value='".$r1["A34"]."'/></td></tr>";
echo "<tr><td>pmax</td><td><input d='A35' class='form-control PRM' value='".$r1["A35"]."'/></td></tr>";
echo "<tr><td>scodays</td><td><input d='A36' class='form-control PRM' value='".$r1["A36"]."'/></td></tr>";
?>
		</tbody>
		</table>
		
