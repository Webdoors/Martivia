<div class="container-fluid">
 <div class='row'>
 <?php
   $striqon=mysqli_query($con,"SELECT * FROM striqoni");
   $rstriqon=mysqli_fetch_assoc($striqon);
 ?>
   <div class="col-sm-12">
   <br/>
   <label for="ge[sarchevi]" class="required">დასახელება geo</label>
			<input type='text'  style='width:100%;' class='txtr form-control' value='<?= $rstriqon['text'] ?>' placeholder='text ge' />
			   
    <br/>
	<label for="ge[sarchevi]" class="required">დასახელება ENG</label>
			<input type='text'  style='width:100%;' class='txtren form-control' value='<?= $rstriqon['engtext'] ?>' placeholder='text ge' />        		
	 <br/>
	 <label for="ge[sarchevi]" class="required">დასახელება RU</label>
	<input type='text'  style='width:100%;' class='txtrru form-control' value='<?= $rstriqon['rutext'] ?>' placeholder='text ru' />		
			<br/>
			
	</div>
	</div>
<div class='row'>
	<div class="col-sm-2">
			<a class="btn btn-outline-success sstr">დამახსოვრება</a>
		</div>
 </div>
 </div>
 