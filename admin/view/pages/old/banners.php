<div class="container-fluid">
	<div class="row">
	<?php
	      $abt=mysqli_query($con,"SELECT logo, id FROM about");
		  $rabt=mysqli_fetch_assoc($abt);
	?>
		<div class='col-sm-12 mt-3'>
	           <input type='hidden' value='<?=$rabt["logo"]?>' n='logo' d='<?=$rabt['id'] ?>' t='about' id="YDA" class='YDA1'/> 
			       <img src="<?=$rabt["logo"]?>" style="width:70px; border:2px" />
			
				<br/>
				<div>
		      <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA&amp;relative_url=0')">
		         <button class="btn iframe-btn btn-outline-success">ლოგო</button>
			  </a>
			  </div>
	</div>  
	
	
		<div class="col-sm-12 mt-3">
<table id="table-ajax-defer" class="table table-striped table-bordered LIS" cellspacing="0">
		<thead>
			<tr>
				<th>გვერდის სახელი (ინგლისურად slug)</th>
				<th>ბანერი</th>
				<th>სურათის ლინკი</th>
			</tr>
		</thead>
		<tbody>

<?php



$q2=mysqli_query($con,"SELECT * FROM banners ORDER BY id DESC");
			while($r2=mysqli_fetch_array($q2)){
?>

			<tr>
				<th><input class="form-control UPT2" d="<?=$r2["id"]?>" n="page" t="banners" value="<?=$r2["page"]?>" disabled /></th>
				<th><input class="form-control UPT2" d="<?=$r2["id"]?>" n="name" t="banners" value="<?=$r2["banner"]?>" disabled /></th>
				<th>
					<div class="input-append row">
						<br><div class="col-md-9">
							<input id="YDA<?=$r2["id"]?>" class="form-control JOU UPT2" d="<?=$r2["id"]?>" n="img" t="banners" placeholder="სურათის ლინკი" type="text" value="<?=$r2["img"]?>">			
						</div>
						<div class="col-md-1">
							<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=0&popup=1&field_id=YDA<?=$r2["id"]?>&relative_url=0')" class="btn iframe-btn btn-outline-primary" type="button">Select</a>
						</div>
					</div>				
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
