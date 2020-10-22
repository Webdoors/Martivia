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

 
 <div class=' row '>
 



    <div class='col-sm-12'>
     
		<?php
		  $abt=mysqli_query($con,"SELECT * FROM about");
		
           if(mysqli_num_rows($abt)==0)
		   {
			   mysqli_query($con,"INSERT INTO about SET aboutus='about us' ");
		
			   ?>
			   <script type='text/javascript'>
			      location.reload();
			   </script>
			   <?php
		   }
      
        $abt=mysqli_query($con,"SELECT t1.*, 
		                        (SELECT column_value FROM langs WHERE table_column='aboutus' AND table_id=t1.id AND table_name='about' AND short_name='en' ) AS aboutusen, 
		                        (SELECT column_value FROM langs WHERE table_column='aboutus' AND table_id=t1.id AND table_name='about' AND short_name='ru' ) AS aboutusru
								  FROM about AS t1");
		$rabt=mysqli_fetch_assoc($abt);
		  $i=0;
		  $lng=mysqli_query($con,"SELECT * FROM langs WHERE table_name='about' AND table_id='".$rabt['id']."' AND table_column='aboutus' AND short_name='ru' AND name='russian' ");
	      if(mysqli_num_rows($lng)==0)
	    {
		  mysqli_query($con,"INSERT INTO langs SET table_name='about', table_id='".$rabt['id']."', table_column='aboutus', short_name='ru', name='russian' ");
		
		
	   }
		 $lng1=mysqli_query($con,"SELECT * FROM langs WHERE table_name='about' AND table_id='".$rabt['id']."' AND table_column='aboutus' AND short_name='en' AND name='english'  ");
	      if(mysqli_num_rows($lng1)==0)
	    {
		  mysqli_query($con,"INSERT INTO langs SET table_name='about', table_id='".$rabt['id']."', table_column='aboutus', short_name='en', name='english' ");	  
		
	   }
		 
		 
           			?>
					
			
		<div class='col-sm-12'>
	           <input type='hidden' value='<?=$rabt["image"]?>' n='image' d='<?=$rabt['id'] ?>' t='about' id="YDA2" class='YDA1'/> 
			       <img src="<?=$rabt["image"]?>" style="width:50%; display:block; margin:auto;" />
			
				<br/>
				<div>
		      <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA2&amp;relative_url=0')">
		         <button class="btn iframe-btn btn-outline-success">Select</button>
			  </a>
			  </div>
	</div> 
					
			 <label for="pdf">ვიდეო</label>		
		 <input type='text' placeholder='ვიდეო' class="form-control UPTBL"  n='video'  d='<?=$rabt['id'] ?>' t='about' value='<?=$rabt['video'] ?>' />		
          <br/>		 
         <div class='enebi' d='1' style='display:none'>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი GEO</label>

                 <textarea class="UPTBL"  id='UPTBL' placeholder="TEXT GEO"  n='aboutus' d='<?=$rabt['id'] ?>' t='about'  ><?=$rabt["aboutus"]?></textarea>
  
           </div>
		 </div>   
		 <div class='enebi' d='2' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი eng</label>

                 <textarea class="UPTBL" id='UPTBLEN' placeholder="TEXT eng"   n='aboutus' d='<?=$rabt['id'] ?>' t='about'><?=$rabt["aboutusen"]?></textarea>
  
           </div>
		 </div>  
		 <div class='enebi' d='3' style='display:none'>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი ru</label>

                 <textarea class="UPTBL" placeholder="TEXT ru" id='UPTBLRU' n='aboutus' d='<?=$rabt['id'] ?>' t='about'><?=$rabt["aboutusru"]?></textarea>
  
           </div>
		 </div>  
				
					  
					 
					   
					 
					 
    
	 
    </div>
 </div>
 <div class="submit my-4">
        <button class="btn btn-outline-success SAVAB" n='aboutus' d='<?=$rabt['id'] ?>' t='about' >დამახსოვრება</button>
    </div>
 
 
</div>

<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: "textarea",
	  height:"400",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],

	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | responsivefilemanager | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
	  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

	  menubar: false,
	  toolbar_items_size: 'small',

	  style_formats: [{
		title: 'Bold text',
		inline: 'b'
	  }, {
		title: 'Red text',
		inline: 'span',
		styles: {
		  color: '#ff0000'
		}
	  }, {
		title: 'Red header',
		block: 'h1',
		styles: {
		  color: '#ff0000'
		}
	  }, {
		title: 'Example 1',
		inline: 'span',
		classes: 'example1'
	  }, {
		title: 'Example 2',
		inline: 'span',
		classes: 'example2'
	  }, {
		title: 'Table styles'
	  }, {
		title: 'Table row 1',
		selector: 'tr',
		classes: 'tablerow1'
	  }],
		setup : function(ed) {
			
			
			
			
			
			 // ed.on('change keyup', function(e) {
				   //console.log('the event object ', e);
				   //console.log('the editor object ', ed);
				  // console.log('the content ', ed.getContent());
				  //console.log(ed.getContent());
				 // func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
				  
			//  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
	  
	});	
});

</script>

<script src="js/tinymce/tinymce.min.js"></script>
