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
   

 <br/>


<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-sm-12">
			<div class="row my-2">
				<div class="col-sm-4">
					<h3>სტატისტიკა</h3>
				</div>
			
			</div>
		</div>
		<div class="col-sm-12">
		<table class="table table-sm w-100 table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
			<th class='enebi' d='1' style='display:none'>Title </th>
			<th class='enebi' d='2'>Title eng</th>
			<th class='enebi' d='3' style='display:none'>Title ru</th>
			<th class='enebi' d='1' style='display:none'>Text ge</th>
			<th class='enebi' d='2'>text en</th>
			<th class='enebi' d='3' style='display:none'>text ru</th>
			

			</tr>
			</thead>
			<tbody>
			<?php
			$tm=mysqli_query($con,"SELECT t1.*, 
								  (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='statistics' AND table_column='name' ) AS nameen,
								  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='statistics' AND table_column='name' ) AS nameru 
								  FROM statistics AS t1  ORDER BY t1.id DESC");
			$i=0;
			while($rtm=mysqli_fetch_assoc($tm))
			{
			$i++;
			?>
			<tr>
			<th class='enebi' d='1' style='display:none'><input type='text' value='<?=$rtm['name'] ?>' class="form-control UPTBL"  n='name' d='<?=$rtm['id'] ?>' t='statistics' /></th>
			<th class='enebi' d='2'><input type='text' value='<?=$rtm['nameen'] ?>' class="form-control UPTBL"  n='name'  ln='en' d='<?=$rtm['id'] ?>'  t='statistics' /></th>
			<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rtm['nameru'] ?>' class="form-control UPTBL"  n='name'  ln='ru' d='<?=$rtm['id'] ?>' t='statistics' /></th>
			<th><textarea type='text' class="form-control UPTBL"  n='value' d='<?=$rtm['id'] ?>' t='statistics'  ><?=$rtm['value'] ?></textarea></th>
			
			</tr>
			<?php
			}
			?>
			</tbody>
		 </table>
		 </div>
	 </div>
 </div>
 </div>
	 