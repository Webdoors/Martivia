<div class="container-fluid">
<div class="row justify-content">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-4">
				<h3>მენიუ</h3>
			</div>
		
		</div>
	</div>
	
	
	<?php
	
	$lcat=mysqli_query($con,"SELECT * FROM categories WHERE pid=0 AND active=1 ");
	while($rlcat=mysqli_fetch_assoc($lcat))
	{ $mct=mysqli_query($con,"SELECT  * FROM categories WHERE  pid='".$rlcat['id']."' AND active=1 ORDER BY position ");
      if(mysqli_num_rows($mct))
	  {
	?>
	
	<div class="col-sm-3">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
		  <th colspan='4'><?=$rlcat['name'] ?></th>
		<tr>
		<th>N</th>
		<th>id</th>
		<th>კატეგორიები</th>
		<th>რიგითობა</th>
	
		</tr>
		</thead>
		<tbody>
		<?php

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
		
		   <select class="form-control chpldps" t="categories" n="position" d="<?=$rmct["id"]?>">
					    <option><?=$i ?></option>
						<?php
						$d=0;
						 $mpo=mysqli_query($con,"SELECT position FROM categories WHERE  position!=0  AND pid='".$rlcat['id']."' AND active=1 ORDER BY position");
						 while($rmpo=mysqli_fetch_assoc($mpo))
						 { $d++;
					        if($d==$i)
							{
								continue;
							}
						?>
						<option value='<?=$rmpo['position'] ?>'><?=$d ?></option>
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
	 
	 <?php
	}}
	?>
 </div>
 </div>
	 