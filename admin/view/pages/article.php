<?php

$a=mysqli_real_escape_string($con,$_GET["id"]);


$T=time();

if($a!=""){
	$q1=mysqli_query($con,"SELECT t1.*,
	(SELECT column_value FROM seo WHERE table_id=t1.id AND   page_name='training' AND table_column='description' AND t1.id='".$a."') AS description
	FROM articles as t1	WHERE t1.id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
}else{

	$ina=mysqli_query($con,"INSERT INTO articles (title,text,img,slug,date,active) VALUES ('','','','','$T',1) ");



	$dd=mysqli_query($con, "SELECT id FROM articles  ORDER BY id DESC");
    $rd=mysqli_fetch_array($dd);
	//$aid=mysqli_insert_id($con);
	$a=$rd['id'];


	?>

<script>location.href="?page=article&id=<?=$a ?>"</script>
<?php
	}
    $desc=mysqli_query($con,"SELECT * FROM seo WHERE page_name='training' AND  table_name='articles' AND table_id='$a' AND table_column='description' ");
	if(mysqli_num_rows($desc)==0)
	{
		mysqli_query($con,"INSERT INTO seo SET page_name='training',  table_name='articles', table_id='$a', table_column='description'");
	
	}


?>
<div class="container">
 <br/>



<h3 class="title mt-3">
    <span>
        Training -ის რედაქტირება
    </span>
</h3>


<?php
   
$a=mysqli_real_escape_string($con,$_GET["id"]);
$q1=mysqli_query($con,"SELECT t1.*,
	(SELECT column_value FROM seo WHERE table_id=t1.id AND  page_name='training' AND table_name='articles' AND table_column='description') AS description
	FROM articles as t1	WHERE t1.id='".$a."' ");
$r1=mysqli_fetch_array($q1);
?>
<div role="tabpanel">
    <!-- Tab panes -->





    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="georgian">
               <div class='enebi' d='1' >
                       <label for="ge[sarchevi]" class="required">დასახელება geo</label>
                       <input class="form-control" value="<?=$r1["title"]?>" rows="10" data-locale="ge" id="ADLGE" name="ADLGE" cols="50">
		               <br>
               </div>
           
<input class="form-control" value="<?=$r1["slug"]?>" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" cols="50" placeholder='slug' />
		
		<br/>
	     	<div class='enebi' d='1' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">მოკლე ტექსტი</label>

                 <textarea class="form-control" id="ADTSHGE" placeholder="TEXT GEO"><?=$r1["short_text"]?></textarea>

           </div>
		 </div>
        
        <br/>
		<div class='enebi' d='1' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი GEO</label>

                 <textarea class="inpu1" id="ADTGE" placeholder="TEXT GEO"><?=$r1["text"]?></textarea>

           </div>
		 </div>

      
            </div>


    </div><!---qart--->
  <br/>
  <div class="tab-content">
       <div class="col-sm-12 pad-no-right pad-no-xs NOP">
	         <label for="pdf">youtube url</label>
			 <input class="form-control video"  rows="10" data-locale="ge" id="SLGGE" name="SLGGE" cols="50" placeholder='youtube url' />
			 <iframe width="100%" height="441" src="<?=$r1['video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>	 
    </div>
	  <br/>
   <div class="tab-content">
       <div class="col-sm-12 pad-no-right pad-no-xs NOP">
	   <label for="pdf">კატეგორიები</label>
	   
			<select class="form-control ACA2" name="ACA">
			<option <?=$r1["category"]==0?"selected":""?> value='0' >აირჩიეთ კატეგორია</option>
<?php
$q2=mysqli_query($con,"SELECT * FROM categories ORDER BY id DESC");
while($r2=mysqli_fetch_array($q2)){
?>
				<option <?=$r1["category"]==$r2["id"]?"selected":""?> value="<?=$r2["id"]?>"><?=$r2["name"]!=""?$r2["name"]:$r2["shortName"]?> - <?=$r2["comment"]?></option>
<?php
}
?>				
			</select>
		
	   </div>
   </div>




    <div class="row nonTranslatedInput pad-no-sm">

        <div class="col-sm-12 pad-no-right pad-no-xs my-2">
            <label for="pdf">სიახლის სურათი</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA9767032" class="form-control UPT" t="news" n="img" d="<?=$r1['id'] ?>" placeholder="Image 1" type="text" value="<?=$r1["img"]?>">
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA9767032&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
				</div>

        </div>
		<br>&nbsp;




    </div>

<br/>
<div class="tab-content">
    <div class='col-sm-12'>
	   <h3>სეო</h3>
	</div>
    <div class='enebi' d='1' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">Description GE SEOO</label>

                 <textarea class="form-control" rows="4" id="ADDESGE" placeholder="Description GEO for SEO"><?=$r1["description"]?></textarea>

           </div>
		 </div>

     
		
		<div class="row">
	<div class="col-sm-12 my-3">



            <label for="pdf">keywords SEO </label>

<div class="input-append row">
					<div class="col-md-3">
						<input  class="form-control nsk"  placeholder="keywords" type="text" >
					</div>
				  <button class="btn iframe-btn btn-primary insk" t="articles" pg='training' n="keyword" d="<?=$r1['id'] ?>">Select</button>
				</div>


<br/>
  <div class='ajaxkeywords'>
       <?php
	          $kw=mysqli_query($con,"SELECT id, keywords FROM seo WHERE table_id='$a' AND table_column='keyword'  AND page_name='training' AND table_name='articles' ");
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>' t='articles' tn='training' pid='<?=$r1['id'] ?>' >
				     <p> <?=$rkw['keywords'] ?> <p>
				  </div>
      		  <?php		  
			  }
	   ?>
  </div>
<br/>
	</div>
</div>
		
</div>
	
	
	<div class="row">

		<div class='col-sm-12'>
		<label>
		    აქტიური
		   <input type='checkbox' <?=$r1['active']=='0'?'checked':'' ?> class='aactv' />
		</label>
	

		</div>
	</div>



    <div class="submit my-4">
        <button  class="btn btn-success SAVNS" d="<?=$a?>">დამახსოვრება</button>
    </div>


</div>





                    </div>
<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: ".inpu1",
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
			  ed.on('change keyup', function(e) {
				   //console.log('the event object ', e);
				   //console.log('the editor object ', ed);
				  // console.log('the content ', ed.getContent());
				  //console.log(ed.getContent());
				//  func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
			  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}

	});
});

</script>

<script src="js/tinymce/tinymce.min.js"></script>
<!---
   <script src="https://cdn.tiny.cloud/1/e0r6yrodxwtfnbylamb80z2mcl1xh83kabyvqlc0px4gryka/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
tinymce.init({
  selector: 'textarea',
  height: 400,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks advcode fullscreen',
    'insertdatetime media table powerpaste hr code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
  	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | responsivefilemanager | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
	  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
	setup : function(ed) {
		  ed.on('change keyup', function(e) {
			   //console.log('the event object ', e);
			   //console.log('the editor object ', ed);
			  // console.log('the content ', ed.getContent());
			  //console.log(ed.getContent());
			  func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
		  });
	},
  powerpaste_allow_local_images: true,
  powerpaste_word_import: 'prompt',
  powerpaste_html_import: 'prompt',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
});

  </script> --->
