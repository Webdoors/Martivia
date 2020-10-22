<?php
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<br>&nbsp;
<div class="container-fluid">
	<div class="row NOP">
		<div class="col-sm-2">
			<input class="form-control A1" placeholder="კატეგორიის სახელი"/>
		</div>
	
		<div class="col-sm-2 d-none">
			<div class="input-append row">
				<div class="col-md-8 NOP ">
					<input id="YDA" class="form-control A3" placeholder="სურათის ლინკი" type="text" value="">			
				</div>
				&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA&relative_url=0')" ><button class="btn iframe-btn btn-outline-primary">Select</button></a>
			</div>
		</div>
		
		<div class="col-sm-2">
			<a class="btn btn-outline-success ADDCAT">დამატება</a>
		</div>
	</div>	
	<hr>
	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>Id</th>
					<th>კატეგორია</th>
					<th class='d-none'>shortName</th>
					
				
				
					<th class='d-none'>სურათი</th>
					<th>რიგითობა</th>
					<th>აქტიური</th>
					<th>წაშლა</th>
				</tr>
			</thead>
			
		
			<tbody>

<?php
$q1=mysqli_query($con,"SELECT * FROM  categories ORDER BY position");
$i=0;
while($r1=mysqli_fetch_array($q1)){
	$i++;
?>
				<tr>
					<td><?=$r1["id"]?></td>
					<td><input class="form-control UPT unm" t="categories" n="name" d="<?=$r1["id"]?>" value="<?=$r1["name"]?>"/></td>
					<td class='d-none'><?=$r1["shortName"]?></td>
					
					
				
					<td class='d-none'>
					<div class="row">
						<div class="col-md-3"><img src="<?=$r1["img"]?>" alt="no image" height="60"/></div>
						<div class="col-md-9 NOP">
							<div class="input-append  row">
								<div class="col-md-6 NOP">
									<input id="YDA<?=$r1["id"]?>" class="form-control UPT" t="categories" n="img" d="<?=$r1["id"]?>" value="<?=$r1["img"]?>" placeholder="სურათის ლინკი" type="text" value="">			
								</div>
								&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA<?=$r1["id"]?>&relative_url=0')" class="btn iframe-btn btn-default" type="button">Select</a>
								&nbsp;<a class="btn btn-default RLO">დამახსოვრება</a>
							</div>							
						</div>					
					</div>
					</td>
					<td>
					  <select class="form-control chpldps" t="categories" n="position" d="<?=$r1["id"]?>">
					    <option><?=$i ?></option>
						<?php
						$d=0;
						 $po=mysqli_query($con,"SELECT position FROM categories WHERE position!=0  ORDER BY position");
						 while($rpo=mysqli_fetch_assoc($po))
						 { $d++;
					        if($d==$i)
							{
								continue;
							}
						?>
						<option value='<?=$rpo['position'] ?>'><?=$d ?></option>
						<?php
						 }
						?>
					  </select>
			
					
					</td>
					<td><input type="checkbox" <?=$r1["active"]=="1"?"checked":""?> class="CATACT" d="<?=$r1["id"]?>"/></td>
				
					<td><a class="btn btn-outline-danger DGA" n="categories" d="<?=$r1["id"]?>">წაშლა</a></td>
				</tr>	
<?php
}
?>				
			</tbody>
		</table>
	</div>
</div>