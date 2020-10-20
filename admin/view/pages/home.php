<div class="col-md-12 MPA MTB">
	<div class="col-md-12">
		<div class="col-md-12">
			<label>Add slides to Home page slider </label>
			<br><input class="form-control STI" placeholder="Slide Title" type="text" value="">					
			<br><input class="form-control SMT" placeholder="Slide small text" type="text" value="">					
		<div class="input-append">
			<br><div class="col-md-6 NOP">
				<input id="YDA" class="form-control" placeholder="სურათის ლინკი" type="text" value="">			
			</div>
			&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA&relative_url=0')" class="btn iframe-btn btn-default" type="button">Select</a>
			<script>
			function open_popup(url){var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);}
			</script>
		</div>
		</div>	
		<div class="col-md-12">
			<br><a class="btn btn-default ASL">Add Slide</a>
		</div>		
	</div>
	<br>&nbsp;
<?php
$q1=mysqli_query($con,"SELECT * FROM slider ORDER BY position DESC");
while($r1=mysqli_fetch_array($q1)){
?>
	<div class="col-md-12 LS" >
		<div class="col-md-12">
			<img style="height:60px;" src="<?=$r1["link"]?>"/>
			
			<a class="btn btn-default DSL" style="float:right" d="<?=$r1["id"]?>">Delete</a>
		</div>		
	</div>
<?php
}
?>
</div>