<div class="container-fluid">
<br/>
      <div class="col-sm-10 mt-3 p-0">
    <div class='row'>
	<div class='col-sm-2'>
	
	    <button class='btn btn-danger  ltab' d='1' > ქართული</button>
	  
	</div>
	<div class='col-sm-2' >

	    <button class='btn btn-success ltab' d='2' >  ინგლისური</button>
	  
	</div>
	<div class='col-sm-2' >
	
	    <button class='btn btn-danger  ltab' d='3'>  რუსული</button>
	  
	</div>
	</div>
  </div>
  

  
	<br/>

 <div class='row'>
   
   <div class="col-sm-11">
			<input type='text' class='form-control slstx enebi' d='1' style='display:none'  placeholder='ტექსტი ge'>


			<input type='text' class='form-control sltxen enebi' d='2' placeholder='ტექსტი en'>
	

			<input type='text' class='form-control sltxru enebi' d='3' style='display:none' placeholder='ტექსტი ru'> 
           <br/>

         	<input type='text' class='form-control desc enebi' d='1'  style='display:none' placeholder='description ge'>


			<input type='text' class='form-control descen enebi' d='2'  placeholder='description eng'>
	

			<input type='text' class='form-control descru enebi' d='3' style='display:none' placeholder='description ru'> 
           <br/>

			<input type='url' class='form-control slink' placeholder='ლინკი'>
	

	

 <br/>
   <div>
            <label for="pdf">სიახლის სურათი</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA9767032" class="form-control slimg"  placeholder="Image 1" type="text" />		
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA9767032&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
				</div>
  
        </div>
 
     <br/>
			<a class="btn btn-outline-success ADDSLD">დამატება</a>
		</div>
 </div>
 <br/>


<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-4">
				<h3>სლაიდერი</h3>
			</div>
		
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
		<th>N</th>
		<th>id</th>
		<th>img</th>
		<th class='enebi' d='1' style='display:none' >title</th>
		<th class='enebi' d='2' >title eng</th>
		<th class='enebi' d='3' style='display:none'>title ru</th>
		<th class='enebi' d='1'  style='display:none'>description</th>
		<th class='enebi' d='2'>description eng</th>
		<th class='enebi' d='3' style='display:none'>description ru</th>
		<th>ლინკი</th>
		<th>რიგითობა</th>
		
		<th>წაშლა</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sld=mysqli_query($con,"SELECT t1.*, 
		     (SELECT column_value FROM langs WHERE short_name='en' AND table_name='slider' AND table_id=t1.id AND table_column='name' ) AS nameen,
		     (SELECT column_value FROM langs WHERE short_name='ru' AND table_name='slider' AND table_id=t1.id  AND table_column='name' ) AS nameru,
		     (SELECT column_value FROM langs WHERE short_name='en' AND table_name='slider' AND table_id=t1.id  AND table_column='description' ) AS descriptionen,
		     (SELECT column_value FROM langs WHERE short_name='ru' AND table_name='slider' AND table_id=t1.id  AND table_column='description' ) AS descriptionru
			 FROM slider AS t1  ORDER BY position");
		$i=0;
		while($rsld=mysqli_fetch_assoc($sld))
		{
		$i++;
		?>
		<tr>
		<th><?=$i ?></th>
		<th><?=$rsld['id'] ?></th>
		<th class='chimg'>
   		      
				 
			
				<div>
				   <input type='hidden' value='<?=$rsld["image"]?>' n='image' d='<?=$rsld['id'] ?>' t='slider' id="YDA<?=$i ?>" class='YDA1'/> 
			       <img src="<?=$rsld["image"]?>" style="width:70px; border:2px" />
				</div>   
				<br/>
				<div>
		      <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA<?=$i?>&amp;relative_url=0')">
		         <button class="btn iframe-btn btn-outline-success">Select</button>
			  </a>
			  </div>
			
		</th>
		<th class='enebi' d='1' style='display:none'><input type='text' value='<?=$rsld['name'] ?>' class="form-control UPTBL"  n='name' d='<?=$rsld['id'] ?>' t='slider' /></th>
		<th class='enebi' d='2' ><input type='text' value='<?=$rsld['nameen'] ?>' class="form-control UPTBL"  n='name'  ln='en' d='<?=$rsld['id'] ?>'  t='slider' /></th>
		<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rsld['nameru'] ?>' class="form-control UPTBL"  n='name'  ln='ru' d='<?=$rsld['id'] ?>' t='slider' /></th>
		<th class='enebi' d='1'  style='display:none'><input type='text' value='<?=$rsld['description'] ?>' class="form-control UPTBL"  n='description' d='<?=$rsld['id'] ?>' t='slider'   /></th>
		<th class='enebi' d='2'><input type='text' value='<?=$rsld['descriptionen'] ?>' ln='en' n='description' d='<?=$rsld['id'] ?>' t='slider' class="form-control UPTBL" /></th>
		<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rsld['descriptionru'] ?>' ln='ru' n='description' d='<?=$rsld['id'] ?>' t='slider' class="form-control UPTBL" /></th>
		<th><input type='text' value='<?=$rsld['url'] ?>' class="form-control UPTBL" d='<?=$rsld['id'] ?>' n='url' t='slider' /></th>
		<th>
		
		   <select class='chslps form-control' d='<?=$rsld['id']?>'>
		   
		    <option>
				 
				    <?=$i ?>
		   </option>
		   <?php
		   $d=0;
		  $slpo=mysqli_query($con,"SELECT  * FROM slider WHERE position!=0 ORDER BY position");
		  while($rslpo=mysqli_fetch_assoc($slpo))
		  { 
	        $d++;
			if($d==$i)
			{
				continue;
			}
			
		?>
		         <option value='<?=$rslpo['position'] ?>' >
				 
				    <?=$d ?>
				 </option>
			<?php
		  }
          ?>		  
		   </select>

		<th><button class='btn btn-outline-danger DGA' d='<?=$rsld["id"] ?>' n='slider'>წაშლა</button></th>
		</tr>
		<?php
		}
		?>
		</tbody>
	 </table>
	 </div>
 </div>
 </div>
	 