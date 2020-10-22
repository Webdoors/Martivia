<div class="col-md-12 MPA MTB">
	<div class="col-md-12">
		<div class="col-md-12">
			<label>Add slides to Home page slider </label>
			<br><input class="form-control STI" placeholder="Slide Title" type="text" value="">					
			<br><input class="form-control SMT" placeholder="Slide small text" type="text" value="">					
			<br><input class="form-control SLI" placeholder="Slide Link" type="text" value="">	
<br>			
		<div class="input-append row m-0">
			<div class="col-md-6 NOP">
				<input id="YDA" class="form-control" placeholder="სურათის ლინკი" type="text" value="">			
			</div>
			<div class="col-md-2 NOP">
			&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA&relative_url=0')" class="btn iframe-btn btn-outline-success" type="button">Select</a>
			</div>

		</div>
		</div>	
		<div class="col-md-12">
			<br><a class="btn btn-success ASL">Add Slide</a>
		</div>		
	</div>
	<br>&nbsp;
<?php
$q1=mysqli_query($con,"SELECT * FROM slider ORDER BY position DESC");
while($r1=mysqli_fetch_array($q1)){
?>
	<div class="row m-0 LS mt-2" >
		<div class="col-md-2">
			<img style="height:60px;" src="<?=$r1["image"]?>"/>

		</div>		
		<div class="col-md-3">
			<input class="form-control UPT" t="slider" placeholder="title" d="<?=$r1["id"]?>" n="name" value="<?=$r1["name"]?>"/>
		</div>
		<div class="col-md-3">
			<input class="form-control UPT" t="slider" placeholder="small text" d="<?=$r1["id"]?>" n="description" value="<?=$r1["description"]?>"/>
		</div>
		<div class="col-md-3">
			<input class="form-control UPT" t="slider" placeholder="URL" d="<?=$r1["id"]?>" n="url" value="<?=$r1["url"]?>"/>
		</div>
		<div class="col-md-1">
			<a class="btn btn-danger DSL mb-5" style="float:right" d="<?=$r1["id"]?>">Delete</a>
		</div>		
	</div>
<?php
}
?>
</div>