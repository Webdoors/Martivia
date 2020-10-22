<div class="container-fluid">
 <div class='row'>
 <br/>
   <div class="col-sm-8 mt-3">
    <div class='row'>
	<div class='col-sm-2'>
	
	    <button class='btn btn-success ltab' d='1' > ქართული</button>
	  
	</div>
	<div class='col-sm-2' >

	    <button class='btn btn-danger ltab' d='2' >  ინგლისური</button>
	  
	</div>
	<div class='col-sm-2' >
	
	    <button class='btn btn-danger  ltab' d='3'>  რუსული</button>
	  
	</div>
	</div>
   </div>
</div>
<br/>

 <div class='row'>
 

   <div class="col-sm-11">
      
	  <div class='enebi' d='1'>
	     <input type='text' class='form-control gamtx' placeholder='კითხვა ge ?' />
			<br>
		 <input type='text' class='form-control var1ge' placeholder='პასუხი ვარიანტი 1 ?' />
			<br/>
		<input type='text' class='form-control var2ge' placeholder='პასუხი ვარიანტი 2 ?' />
			<br/>
		<input type='text' class='form-control var3ge' placeholder='პასუხი ვარიანტი 3 ?' />	
	  </div>
	  
	  <div class='enebi ' style='display:none' d='2'>
	    <input type='text' class='form-control gamtxen' placeholder='კითხვა eng ?'/>
		</br>
		 <input type='text' class='form-control var1eng' placeholder='პასუხი ვარიანტი 1 ?' />
		 <br/>
		<input type='text' class='form-control var2eng' placeholder='პასუხი ვარიანტი 2 ?' />
		<br/>
		<input type='text' class='form-control var3eng' placeholder='პასუხი ვარიანტი 3 ?' />
	
			
	  </div>
	  <div class='enebi' style='display:none' d='3'>
	    <input type='text' class='form-control gamtxru' placeholder='კითხვა ru ?'/>
			
			<br/>
			   
		    <input type='text' class='form-control var1ru' placeholder='პასუხი ვარიანტი 1 ?' />
			<br/>
			<input type='text' class='form-control var2ru' placeholder='პასუხი ვარიანტი 2 ?' />
			<br/>
			<input type='text' class='form-control var3ru' placeholder='პასუხი ვარიანტი 3 ?' />
	     
	  </div>

			
			
			
	</div>
</div>
<br/>
<div class='row'>
	<div class="col-sm-2">
			<a class="btn btn-outline-success ADDGAM">დამატება</a>
		</div>
</div>
	<br/>
	<br/>
   <div class="row justify-content-center">

 
      <div class="col-sm-12">
	     <table class="table table-sm table-striped table-bordered table-condensed table-hover">
		    <tr>
			   <th>N</th>
			   <th>სათაური</th>
			   <th>ვარიანტი 1</th>
			   <th>ვარიანტი 2</th>
			   <th>ვარიანტი 3</th>
			   <th>გამოჩენა</th>
			  
			   <th>წაშლა</th>
			</tr>
			<?php 
			$gamm=mysqli_query($con,"SELECT * FROM gamokitxvebi ORDER BY id DESC ");
			while($rgam=mysqli_fetch_assoc($gamm))
			{ $ki=mysqli_query($con,"SELECT COUNT(SHEPASEBA) as shep FROM rating WHERE pid='".$rgam['id']."' AND shepaseba=1 ");
		       $rki=mysqli_fetch_assoc($ki);
			    $ara=mysqli_query($con,"SELECT COUNT(SHEPASEBA) as shep FROM rating WHERE pid='".$rgam['id']."'  AND shepaseba=0");
		       $rara=mysqli_fetch_assoc($ara);
			    $netrl=mysqli_query($con,"SELECT COUNT(SHEPASEBA) as shep FROM rating WHERE pid='".$rgam['id']."' AND shepaseba=2 ");
		       $rnetrl=mysqli_fetch_assoc($netrl);
		
				?>
				<tr>
				  <th><?=$rgam['id'] ?></th>
				  <th>
				  <input type='text' value='<?=$rgam['title'] ?>' class='form-control p-0 chgam chgams' d='<?=$rgam['id'] ?>' placeholder='text ge' />
				  <br/>
				  <input type='text' value='<?=$rgam['engtitle'] ?>' class='form-control p-0 chgams chgamen' d='<?=$rgam['id'] ?>' placeholder='text en' />
				  <br/>
				  <input type='text' value='<?=$rgam['rutitle'] ?>' class='form-control p-0 chgams chgamru' d='<?=$rgam['id'] ?>' placeholder='text ru' />
				  </th>
				  <th>
				   <div class='row'>
				  <div class='col-6'>
				 
				       <input type='text' class='form-control chgams chpir' value='<?=$rgam['pirveli'] ?>' placeholder='ge'  d='<?=$rgam['id'] ?>' />
					   <br/>
				       <input type='text' class='form-control chgams chpiren' value='<?=$rgam['engpirveli'] ?>' placeholder='eng'  d='<?=$rgam['id'] ?>' />
					   <br/>
				       <input type='text' class='form-control chgams chpirru' value='<?=$rgam['rupirveli'] ?>' placeholder='ru'  d='<?=$rgam['id'] ?>' />
				     </div>
				     <div class='col-6'>
			             <?=$rki['shep'] ?>
				     </div>
					</div> 
				  </th>
				  <th>
				    <div class='row'>
				      <div class='col-6'>
				 
				         <input type='text' class='form-control chgams chmer' value='<?=$rgam['meore'] ?>' placeholder='ge'  d='<?=$rgam['id'] ?>' />
					     <br/>
				         <input type='text' class='form-control chgams chmeren' value='<?=$rgam['engmeore'] ?>' placeholder='eng'  d='<?=$rgam['id'] ?>' />
					     <br/>
				         <input type='text' class='form-control chgams chmerru' value='<?=$rgam['rumeore'] ?>' placeholder='ru'  d='<?=$rgam['id'] ?>' />
				       </div>
				  
				       <div class='col-6'>
				           <?=$rara['shep'] ?>
				       </div>
					  </div> 
				     </th>
				  
				  <th>
				     <div class='row'>
				        <div class='col-6'>
				 
				           <input type='text' class='form-control chgams chmes' value='<?=$rgam['mesame'] ?>' placeholder='ge'  d='<?=$rgam['id'] ?>' />
					       <br/>
				           <input type='text' class='form-control chgams chmesen' value='<?=$rgam['engmesame'] ?>' placeholder='eng'  d='<?=$rgam['id'] ?>' />
					       <br/>
				           <input type='text' class='form-control chgams chmesru' value='<?=$rgam['rumesame'] ?>' placeholder='ru'  d='<?=$rgam['id'] ?>' />
				         </div>
					     <div class='col-6'>
				            <?=$rnetrl['shep'] ?>
						 </div>	
				        </div>
				  </th>
				  <th><input type='radio' <?=$rgam['active']==1?'checked':'' ?> name='nn' class='shgam' d='<?=$rgam['id'] ?>'/></th>
				
				  <th><a class='delgam' d='<?=$rgam['id'] ?>'>წაშლა</a></th>
				</tr> 
				<?php
			}
			
			?>
			
		 </table>
	  </div>

</div>	
</div>	