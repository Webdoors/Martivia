<?php
$q1=mysqli_query($con,"SELECT * FROM about");
$r1=mysqli_fetch_array($q1);
?>
<div class="container-fluid pb-5">
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h2>Ika-ს შესახებ გვერდის რედაქტირება</h2>
		</div>
		<div class="col-sm-12 my-2">
			<div class="input-append row mx-0">
				<br><div class="col-md-6 NOP">
					<input id="YDA<?=$r1["id"]?>" class="form-control UPT2" d="1" t="about" n="image" placeholder="სურათის ლინკი" type="text" value="<?=$r1["image"]?>">			
				</div>
				&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA<?=$r1["id"]?>&relative_url=0')" class="btn iframe-btn btn-primary" type="button">Select</a>
			</div>	
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="about" n="texttitle" value="<?=$r1["texttitle"]?>" d="1" placeholder="Ika-ს შესახებ გვერდის ტექსტის სათაური" />
		</div>
		<div class="col-sm-8 my-2">
			<textarea class="form-control UPT" t="about" n="text"  d="1" placeholder="Ika-ს შესახებ გვერდის ტექსტი" ><?=$r1["text"]?></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h2>Ika-ს შესახებ გვერდის ფორმის რედაქტირება</h2>
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="about" n="formtexttitle" value="<?=$r1["formtexttitle"]?>" d="1" placeholder="Ika-ს შესახებ გვერდის ფორმის ტექსტის სათაური" />
		</div>
		<div class="col-sm-8 my-2">
			<textarea class="form-control UPT" t="about" n="formtext"  d="1" placeholder="Ika-ს შესახებ გვერდის ფორმის ტექსტი" ><?=$r1["formtext"]?></textarea>
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="about" n="formemail" value="<?=$r1["formemail"]?>" d="1" placeholder="Ika-ს შესახებ გვერდის ფორმის email" />
		</div>
	</div>
</div>