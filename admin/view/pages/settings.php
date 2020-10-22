<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-12'>
			 
				<?php
				  $abt=mysqli_query($con,"SELECT * FROM about");
				
				   if(mysqli_num_rows($abt)==0)
				   {
					   mysqli_query($con,"INSERT INTO about SET logo='' ");
				
					   ?>
					   <script type='text/javascript'>
						  location.reload();
					   </script>
					   <?php
				   }
				   else
				   {
					   $rabt=mysqli_fetch_assoc($abt);
					   ?>
					   <div class='col-sm-12 mt-3'>
					   <input type='hidden' value='<?=$rabt["logo"]?>' n='logo' d='<?=$rabt['id']?>' t='about' id="YDA" class='YDA1'/> 
						   <img src="<?=$rabt["logo"]?>" class="mb-3" style="width:70px; border:2px" />
					
						<br/>
						<div>
					  <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA&relative_url=0&fldr=logo')">
						 <button class="btn iframe-btn btn-outline-success">ლოგო</button>
					  </a>
					  </div>
					 </div>  
					   
					   <?php
				   }   
				   
				   ?>
		</div>		   		
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPT" placeholder="Instagram Page Link" n="instagram" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["instagram"]?>"/>
		</div>	   		
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPT" placeholder="Facebook Page Link" n="facebook" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["facebook"]?>" />
		</div>	   		
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPT" placeholder="Twitter Page Link" n="twitter" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["twitter"]?>" />
		</div>	   		
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPT" placeholder="Youtube Page Link" n="youtube" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["youtube"]?>" />
		</div>   		
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPT" placeholder="Linkedin Page Link" n="linkedin" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["linkedin"]?>" />
		</div>
	</div>	
</div>		   