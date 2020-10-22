<?php
$q1=mysqli_query($con,"SELECT * FROM mainpage");
$r1=mysqli_fetch_array($q1);
?>
<div class="container-fluid pb-5">
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h2>მთავარი გვერდის რედაქტირება</h2>
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="mainpage" n="texttitle" value="<?=$r1["texttitle"]?>" d="1" placeholder="მთავარი გვერდის ტექსტის სათაური" />
		</div>
		<div class="col-sm-8 my-2">
			<textarea class="form-control UPT" t="mainpage" n="text"  d="1" placeholder="მთავარი გვერდის ტექსტი" ><?=$r1["text"]?></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h2>3 ბანერის მოდული</h2>
		</div>
		<div class="col-sm-8 my-2">
			<input class="form-control UPT" t="mainpage" n="bannerstexttitle" d="1" value="<?=$r1["bannerstexttitle"]?>" placeholder="3 ბანერი-ის მოდულის დიდი სათაური" />
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="mainpage" n="bannerstext" d="1" value="<?=$r1["bannerstext"]?>" placeholder="3 ბანერი-ის მოდულის პატარა ტექსტი" />
		</div>
<?php
for($i=1;$i<=3;$i++){
?>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="mainpage" n="banner<?=$i?>title" d="1" value="<?=$r1["banner".$i."title"]?>" placeholder="ბანერი <?=$i?>-ის სათაური" />
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="mainpage" n="banner<?=$i?>text" d="1" value="<?=$r1["banner".$i."text"]?>" placeholder="ბანერი <?=$i?>-ის ტექსტი" />
		</div>
		<div class="col-sm-3 my-2">
			<div class="row m-0">
			<div class="col-md-9 NOP">
				<input id="YDA<?=$i?>" class="form-control UPT" t="mainpage" d="1" n="banner<?=$i?>img" placeholder="სურათის ლინკი" type="text" value="<?=$r1["banner".$i."img"]?>">			
			</div>
			<div class="col-md-2 ml-1 NOP">
			<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA<?=$i?>&relative_url=0')" class="btn iframe-btn btn-outline-success" type="button">Select</a>
			</div>

			</div>
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="mainpage" n="banner<?=$i?>link" d="1" value="<?=$r1["banner".$i."link"]?>" placeholder="ბანერი <?=$i?>-ის ლინკი" />
		</div>
<?php
}
?>

	</div>
	<div class="row">
		<div class="col-sm-11 mt-2">
			<h2>სამოტივაციო ტექსტები</h2>
		</div>
		<div class="col-sm-1 mt-2">
			<a target="_blank" class=" d-flex btn btn-primary" href="https://webdoors.ge/supr/icons.html">Icon-ები</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 my-2">
			<input class="form-control UPT" t="mainpage" n="motivbigtext" d="1" value="<?=$r1["motivbigtext"]?>" placeholder="სამოტივაციო მოდულის დიდი სათაური" />
		</div>
	</div>
<?php
for($i=1;$i<=6;$i++){
?>
	<div class="row">
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="mainpage" n="motiv<?=$i?>title" d="1" value="<?=$r1["motiv".$i."title"]?>" placeholder="<?=$i?>-ი სამოტივაციოს სათაური" />
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="mainpage" n="motiv<?=$i?>text" d="1" value="<?=$r1["motiv".$i."text"]?>" placeholder="<?=$i?>-ი სამოტივაციოს ტექსტი" />
		</div>
		<div class="col-sm-3 my-2">
			<div class="row">
				<div class="col-sm-2">
				<i class="<?=$r1["motiv".$i."icon"]!=""?$r1["motiv".$i."icon"]:"fa fa-bars"?>" style="font-size:24px" id="ICON"></i>
				</div>
				<div class="col-sm-10 ">
					<select class="form-control UPT" onchange='$(this).parent().parent().find("#ICON").attr("class",this.value);' t="mainpage" n="motiv<?=$i?>icon" d="1" >
						<option>აირჩიეთ icon</option>
		<?php
		$q2=mysqli_query($con,"SELECT * FROM icons");
		while($r2=mysqli_fetch_array($q2)){
		?>
			<option <?=trim($r2["icon"])==$r1["motiv".$i."icon"]?"selected":""?> ><?=trim($r2["icon"])?></option>
		<?php
		}
		?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="mainpage" n="motiv<?=$i?>link" value="<?=$r1["motiv".$i."link"]?>" d="1" placeholder="<?=$i?>-ი სამოტივაციოს ლინკი" />
		</div>
	</div>
<?php
}
?>
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h2>მოკლე ტექსტის მოდულის რედაქტირება</h2>
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="mainpage" n="smalltexttitle" value="<?=$r1["smalltexttitle"]?>" d="1" placeholder="მოკლე ტექსტის სათაური" />
		</div>
		<div class="col-sm-8 my-2">
			<textarea class="form-control UPT" t="mainpage" n="smalltext"  d="1" placeholder="მოკლე ტექსტის" ><?=$r1["smalltext"]?></textarea>
		</div>
		<div class="col-sm-6 my-2">
			<textarea class="form-control UPT" t="mainpage" n="smalltextlink"  d="1" placeholder="მოკლე ტექსტის ღილაკის ლინკი" ><?=$r1["smalltextlink"]?></textarea>
		</div>
	</div>
</div>
