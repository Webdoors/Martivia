<?php
 $pgt=mysqli_query($con,"SELECT * FROM texttraining  ");


 $rpgt=mysqli_fetch_assoc($pgt);
 
?>

<div class="container">
 <br/>



<h3 class="title mt-3">
    <span>
       text page training
    </span>
</h3>

<div class="row">
	<div class="col-sm-12 my-3">



            <label for="pdf">title</label>

<div class="input-append row">
					<div class="col-md-3">
						<input  class="form-control pagetitle"  placeholder="title" value='<?=$rpgt['title'] ?>' type="text" >
					</div>
				
				</div>


<br/>

<div class='container-tab w-100' >
		<div class='enebi' d='1' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">text</label>

                 <textarea class="form-control" rows="4" id="pagetext" placeholder="text"><?=$rpgt['text'] ?></textarea>

           </div>
		 </div>

      

</div>
  <div class="submit my-4">
        <button class="btn btn-outline-success ptext"  t="texttraining" >დამახსოვრება</button>
    </div>
	</div>
</div>
</div>