<?php
$q1=mysqli_query($con,"SELECT * FROM contact");
$r1=mysqli_fetch_array($q1);
?>
<div class="container-fluid pb-5">
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h2>კონტაქტის გვერდის რედაქტირება</h2>
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="contact" n="texttitle" value="<?=$r1["texttitle"]?>" d="1" placeholder="კონტაქტის გვერდის ტექსტის სათაური" />
		</div>
		<div class="col-sm-8 my-2">
			<textarea class="form-control UPT" t="contact" n="text"  d="1" placeholder="კონტაქტის გვერდის ტექსტი" ><?=$r1["text"]?></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h3>მისამართი</h2>
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="contact" n="country" value="<?=$r1["country"]?>" d="1" placeholder="ქვეყანა" />
		</div>
		<div class="col-sm-3 my-2">
			<textarea class="form-control UPT" t="contact" n="address"  d="1" placeholder="მისამართი" ><?=$r1["address"]?></textarea>
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="contact" n="email"  d="1" placeholder="ელფოსტა" value="<?=$r1["email"]?>"/>
		</div>
		<div class="col-sm-3 my-2">
			<input class="form-control UPT" t="contact" n="tel"  d="1" placeholder="ტელეფონი" value="<?=$r1["tel"]?>"/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h3>Google Iframe</h2>
		</div>
		<div class="col-sm-12 my-2">
			<textarea class="form-control UPT" t="contact" n="googlemap"  d="1" placeholder="Google Iframe Code" ><?=$r1["googlemap"]?></textarea>
		</div>

	</div>
	<div class="row">
		<div class="col-sm-12 mt-2">
			<h3>ფორმის რედაქტირება</h2>
		</div>
		<div class="col-sm-4 my-2">
			<input class="form-control UPT" t="contact" n="formtexttitle" value="<?=$r1["formtexttitle"]?>" d="1" placeholder="ფორმის ტექსტის სათაური" />
		</div>
		<div class="col-sm-8 my-2">
			<textarea class="form-control UPT" t="contact" n="formtext"  d="1" placeholder="ფორმის ტექსტი" ><?=$r1["formtext"]?></textarea>
		</div>
		<div class="col-sm-5 my-2">
			<input class="form-control UPT" t="contact" n="formemail"  d="1" placeholder="Send form email" value="<?=$r1["formemail"]?>"/>
		</div>

	</div>
</div>