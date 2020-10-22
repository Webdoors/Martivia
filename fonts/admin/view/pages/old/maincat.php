<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-4">
				<h3>მთავარზე</h3>
			</div>
		
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
		<th>N</th>
		<th>id</th>
		<th>კატეგორიები</th>
		<th>რიგითობა</th>
	
		</tr>
		</thead>
		<tbody>
		<?php
		$mct=mysqli_query($con,"SELECT  * FROM categories WHERE main=1 ORDER BY mainposition ");
		$i=0;
		while($rmct=mysqli_fetch_assoc($mct))
		{
		$i++;
		?>
		<tr>
		<th><?=$i ?></th>
		<th><?=$rmct['id'] ?></th>
	
		<th><?=$rmct['name'].' - '.$rmct['engname'] ?></th>

		<th>
		
		   <select class="form-control chmps" t="categories" n="position" d="<?=$rmct["id"]?>">
					    <option><?=$i ?></option>
						<?php
						$d=0;
						 $mpo=mysqli_query($con,"SELECT mainposition FROM categories WHERE main=1 AND mainposition!=0  ORDER BY mainposition");
						 while($rmpo=mysqli_fetch_assoc($mpo))
						 { $d++;
					        if($d==$i)
							{
								continue;
							}
						?>
						<option value='<?=$rmpo['mainposition'] ?>'><?=$d ?></option>
						<?php
						 }
						?>
			</select>
		
		</th>
	
		</tr>
		<?php
		}
		?>
		</tbody>
	 </table>
	 </div>
 </div>
 </div>
	 