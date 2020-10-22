<div class="container-fluid">
<br/>
      <div class="col-sm-10 mt-3 p-0">
    <div class='row'>
	<div class='col-sm-2'>
	
	    <button class='btn btn-danger ltab' d='1' > ქართული</button>
	  
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
			<input type='text' class='form-control tmname enebi' style='display:none' d='1' placeholder='სახელი ge'>


			<input type='text' class='form-control tmnamen enebi' d='2'  placeholder='სახელი en'>
	

			<input type='text' class='form-control tmnamru enebi' d='3' style='display:none' placeholder='სახელი ru'> 
           <br/>

         	<input type='text' class='form-control tmlname enebi' d='1' style='display:none' placeholder='გვარი ge'>


			<input type='text' class='form-control tmlnamen enebi' d='2'  placeholder='გვარი en'>
	

			<input type='text' class='form-control tmlnamru enebi' d='3' style='display:none' placeholder='გვარი ru'> 
           <br/>
		

         	<input type='text' class='form-control tmpos enebi' d='1'  style='display:none' placeholder='პოზიცია ge'>


			<input type='text' class='form-control tmposen enebi' d='2' placeholder='პოზიცია en'>
	

			<input type='text' class='form-control tmposru enebi' d='3' style='display:none' placeholder='პოზიცია ru'> 
           <br/>

			


   <div>
            <label for="pdf">სიახლის სურათი</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA9767032" class="form-control tmimg"  placeholder="Image 1" type="text" />		
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA9767032&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
				</div>
  
        </div>
 
     <br/>
			<a class="btn btn-outline-success ADDTEAM">დამატება</a>
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
		<th class='enebi' d='1' style='display:none'>name </th>
		<th class='enebi' d='2' >name eng</th>
		<th class='enebi' d='3' style='display:none'>name ru</th>
		<th class='enebi' d='1' style='display:none'>lastname</th>
		<th class='enebi' d='2' >lastname eng</th>
		<th class='enebi' d='3' style='display:none'>lastname ru</th>
		<th class='enebi' d='1' style='display:none'>position</th>
		<th class='enebi' d='2'>position en</th>
		<th class='enebi' d='3' style='display:none'>position ru</th>
		

		
		<th>წაშლა</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$tm=mysqli_query($con,"SELECT t1.*, 
		                      (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='teams' AND table_column='name' ) AS nameen,
							  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='teams' AND table_column='name' ) AS nameru,
							  (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='teams' AND table_column='lastname' ) AS lastnamen,
							  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='teams' AND table_column='lastname' ) AS lastnamru,
							  (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='teams' AND table_column='position' ) AS positionen,
							  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='teams' AND table_column='position' ) AS positionru
							  FROM teams AS t1  ORDER BY t1.id DESC");
		$i=0;
		while($rtm=mysqli_fetch_assoc($tm))
		{
		$i++;
		?>
		<tr>
		<th><?=$i ?></th>
		<th><?=$rtm['id'] ?></th>
		<th class='chimg'>
   		      
				 
			
				<div>
				   <input type='hidden' value='<?=$rtm["image"]?>' n='image' d='<?=$rtm['id'] ?>' t='teams' id="YDA<?=$i ?>" class='YDA1'/> 
			       <img src="<?=$rtm["image"]?>" style="width:70px; border:2px" />
				</div>   
				<br/>
				<div>
		      <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA<?=$i?>&amp;relative_url=0')">
		         <button class="btn iframe-btn btn-outline-success">Select</button>
			  </a>
			  </div>
			
		</th>
		<th class='enebi' d='1' style='display:none'><input type='text' value='<?=$rtm['name'] ?>' class="form-control UPTBL"  n='name' d='<?=$rtm['id'] ?>' t='teams' /></th>
		<th class='enebi' d='2' ><input type='text' value='<?=$rtm['nameen'] ?>' class="form-control UPTBL"  n='name'  ln='en' d='<?=$rtm['id'] ?>'  t='teams' /></th>
		<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rtm['nameru'] ?>' class="form-control UPTBL"  n='name'  ln='ru' d='<?=$rtm['id'] ?>' t='teams' /></th>
		<th class='enebi' d='1' style='display:none'><input type='text' value='<?=$rtm['lastname'] ?>' class="form-control UPTBL"  n='lastname' d='<?=$rtm['id'] ?>' t='teams'   /></th>
		<th class='enebi' d='2'><input type='text' value='<?=$rtm['lastnamen'] ?>' ln='en' n='lastname' d='<?=$rtm['id'] ?>' t='teams' class="form-control UPTBL" /></th>
		<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rtm['lastnamru'] ?>' ln='ru' n='lastname' d='<?=$rtm['id'] ?>' t='teams' class="form-control UPTBL" /></th>
		<th class='enebi' d='1' style='display:none'><input type='text' value='<?=$rtm['position'] ?>' class="form-control UPTBL"  n='position' d='<?=$rtm['id'] ?>' t='teams'   /></th>
		<th class='enebi' d='2' ><input type='text' value='<?=$rtm['positionen'] ?>' ln='en' n='position' d='<?=$rtm['id'] ?>' t='teams' class="form-control UPTBL" /></th>
		<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rtm['positionru'] ?>' ln='ru' n='position' d='<?=$rtm['id'] ?>' t='teams' class="form-control UPTBL" /></th>
		<th><a class='DGA' d='<?=$rtm["id"] ?>' n='teams'>წაშლა</a></th>
		</tr>
		<?php
		}
		?>
		</tbody>
	 </table>
	 </div>
 </div>
 </div>
	 