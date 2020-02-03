<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
$q12=mysqli_query($con,"SELECT user FROM admins WHERE id='".$a."'");
$r12=mysqli_fetch_array($q12);
$q1=mysqli_query($con,"SELECT * FROM permissions WHERE adminid='".$a."'");
$r1=mysqli_fetch_array($q1);
?>
<table class="t1 table table-striped table-bordered dataTable">
		
		<thead>
		<tr>
			<td><?=$r12["user"]?> - უფლებები</td>
		</tr>
		<tr>
			<th>პარამეტრები</th>
			<th>ჩართვა/გამორთვა</th>
		</tr>
		</thead>
		<tbody>
<?php
echo "<tr><td>უფლებები</td><td><input type='checkbox' class='PAD' aid='".$a."' d='permissions' ".($r1["permissions"]==1?"checked":"")." /></td></tr>";
echo "<tr><td>გვერდი - ადმინები</td><td><input type='checkbox' class='PAD' aid='".$a."' d='admins' ".($r1["admins"]==1?"checked":"")." /></td></tr>";
echo "<tr><td>მატრიცები</td><td><input type='checkbox' class='PAD' aid='".$a."' d='matrix' ".($r1["matrix"]==1?"checked":"")." /></td></tr>";
echo "<tr><td>გვერდი - მერჩანტები</td><td><input type='checkbox' class='PAD' aid='".$a."' d='merchants' ".($r1["merchants"]==1?"checked":"")." /></td></tr>";
echo "<tr><td>გვერდი - რეპორტები</td><td><input type='checkbox' class='PAD' aid='".$a."' d='reports' ".($r1["reports"]==1?"checked":"")." /></td></tr>";
echo "<tr><td>გვერდი - Dashboard</td><td><input type='checkbox' class='PAD' aid='".$a."' d='dashboard' ".($r1["dashboard"]==1?"checked":"")." /></td></tr>";
echo "<tr><td>გვერდი - Plugins</td><td><input type='checkbox' class='PAD' aid='".$a."' d='plugins' ".($r1["plugins"]==1?"checked":"")." /></td></tr>";
?>
		</tbody>
		</table>
		
