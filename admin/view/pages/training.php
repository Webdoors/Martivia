<?php
$a=mysqli_real_escape_string($con,$_GET["id"]);
$T=time();
if($a!=""){
	$q1=mysqli_query($con,"SELECT * FROM trainings WHERE id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
}else{
	mysqli_query($con,"INSERT INTO trainings SET date='".$T."'");
	$aid=mysqli_insert_id($con);
	$a=$aid;

	?>
<script>location.href="?page=training&id=<?=$a?>"</script>
<?php
	}
?>
<div class="container">
                                                
<h3 class="title mt-3">
    <span>
        Training-ის რედაქტირება 
    </span>
</h3>
<div class="row">
	<div class="col-sm-12 my-3">
		<a style="color:#FFF" target="_blank" class="btn btn-primary" href="https://ikaweightlifter.com/training/<?=$r1["slug"]?>">training-ის ნახვა</a>
	</div>
</div>
<?php
$a=mysqli_real_escape_string($con,$_GET["id"]);
$q1=mysqli_query($con,"SELECT * FROM trainings  WHERE id='".$a."'");
$r1=mysqli_fetch_array($q1);
?>
<div role="tabpanel">
    <!-- Tab panes -->
    <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="georgian">

                                <label for="ge[sarchevi]" class="required">დასახელება</label>
<input class="form-control" value="<?=$r1["title"]?>" rows="10" data-locale="ge" id="ADLGE" name="ADLGE" cols="50">
		<br> <label for="ge[sarchevi]" class="required">Keywords SEO</label>
<input class="form-control" value="<?=$r1["keywords"]?>" rows="10" data-locale="ge" id="KEYS" name="SLGGE" cols="50">
		<br> <label for="ge[sarchevi]" class="required">Description SEO</label>
<input class="form-control" value="<?=$r1["description"]?>" rows="10" data-locale="ge" id="DESC" name="SLGGE" cols="50">
		<br>
<input class="form-control" value="<?=$r1["slug"]?>" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" cols="50">
		<br>
        <div class="col-sm-12 pad-no-right pad-no-xs NOP">
            <label for="pdf">ტექსტი</label>

               <textarea id="ADTGE" placeholder="სიახლის ტექსტი"><?=$r1["text"]?></textarea>
  
        </div>

                
            </div>

        
    </div>







    <div class="row nonTranslatedInput pad-no-sm">
        
        <div class="col-sm-12 pad-no-right pad-no-xs my-2">
            <label for="pdf">სიახლის სურათი</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA9767032" class="form-control UPT" t="main" n="img1" d="1" placeholder="Image 1" type="text" value="<?=$r1["img"]?>">		
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA9767032&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
				</div>
  
        </div>
		<br>&nbsp;




    

    </div>
	<div class="row">
		<div class="col-sm-2">
			<label for="ACA">აირჩიეთ კატეგორია</label>
		</div>
		<div class="col-sm-4">
			<select class="form-control ACA2" name="ACA">
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
    <div class="submit my-4">
        <button  class="btn btn-success SAVNS" d="<?=$a?>">დამახსოვრება</button>
    </div>
    

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
			  ed.on('change keyup', function(e) {
				   //console.log('the event object ', e);
				   //console.log('the editor object ', ed);
				  // console.log('the content ', ed.getContent());
				  //console.log(ed.getContent());
				  func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
			  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
	  
	});	
});

</script>
<script src="js/tinymce/tinymce.min.js"></script>