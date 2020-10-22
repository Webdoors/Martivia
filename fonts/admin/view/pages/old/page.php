<?php
	$ACP=1;
	$co=20;
	if($_REQUEST["p"]>0){
		$ACP=mysqli_real_escape_string($con,$_REQUEST["p"]);
	}
	$fr=($ACP-1)*$co;
	$key=urldecode(mysqli_real_escape_string($con,$_GET["key"]));
	if($key!=""){
		$WKE=" AND title LIKE '%".$key."%'";
	}
?>
<?php
$a=mysqli_real_escape_string($con,$_GET["id"]);
$q1p=mysqli_query($con,"SELECT * FROM pages WHERE id='".$a."'");
$r1p=mysqli_fetch_array($q1p);
?>
<input type="hidden" class="page" value="<?=$a?>"/>
	<div class="col-md-12">
		<br>
		<label><a href="?page=pages">Pages</a> > page id: #<?=$a?></label>
		<br>
		<br>
		<label><a target="_blank" href="http://webdoors.ge/?page=<?=$a?>">View page Link</a></label>
		<br>
		<label>Show/hide</label>
		<input class="IN AC1 UNO" <?=$r1p["showhide"]==1?"checked":""?> n="showhide" type="checkbox"/>
		<br>
		<label>Show in main menu</label>
		<input class="IN AC2 UNO" <?=$r1p["menu"]==1?"checked":""?> n="menu" type="checkbox" />
		<br>
		<label>Page title ENG</label>
		<input class="IN A1 form-control" n="titleen" value="<?=$r1p["titleen"]?>" placeholder="Page title" />
		<br>
		<label>Page title GEO</label>
		<input class="IN A1 form-control" n="titlege" value="<?=$r1p["titlege"]?>" placeholder="Page title" />
		<br>
		<label>Page Key GEO</label>
		<input class="IN A1 form-control" n="keyge" value="<?=$r1p["keyge"]?>" placeholder="Page key ge" />
		<br>
		<label>Page Key EN</label>
		<input class="IN A1 form-control" n="keyen" value="<?=$r1p["keyen"]?>" placeholder="Page key en" />
		<br>
		<label>Page Desc GEO</label>
		<textarea class="IN A1 form-control" n="descge" value="" placeholder="Page description" ><?=$r1p["descge"]?></textarea>
		<br>
		<label>Page Desc ENG</label>
		<textarea class="IN A1 form-control" n="descen" value="" placeholder="Page description" ><?=$r1p["descen"]?></textarea>
		<br>
		<label>Page slug</label>
		<input class="IN A1 form-control" n="slug" value="<?=$r1p["slug"]?>" placeholder="Page title" />
		<br>
		<label>Choose Category if needed</label>
		<select class="IN form-control AC3" n="category">
			<option>Choose category</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM categories ORDER BY id ASC");
while($r1=mysqli_fetch_array($q1)){
?>
			<option <?=$r1p["category"]==$r1["id"]?"selected":""?> value="<?=$r1["id"]?>"><?=$r1["id"]?>. <?=$r1["name"]?></option>
<?php
}
?>
		</select>
		<br>
		<label>Choose Page Type</label>
		<select class="IN form-control AC4" n="ptype">
			<option <?=$r1p["ptype"]==1?"selected":""?> value="1">Page with text editor</option>
			<option <?=$r1p["ptype"]==2?"selected":""?> value="2">Page with Gallery and text editor</option>
			<option <?=$r1p["ptype"]==3?"selected":""?> value="3">Page with posts</option>
		</select>
		<div <?=$r1p["ptype"]==2?'style="display:block"':''?> class="GAL"><br>
			<label>Gallery</label>
			<div class="input-append">
				<div class="col-md-6 NOP">
					<input id="YDG" class="form-control" placeholder="Image link" type="text" >
				</div>
				&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDG&relative_url=0')" class="btn iframe-btn btn-default" type="button">Select</a>
				<a class="btn btn-default ATG" d>Add to Galley</a>
				<script>
				function open_popup(url){var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);}
				</script>
			</div>
			<br>
			<div class="col-md-12 NOP">
<?php
$q2=mysqli_query($con,"SELECT * FROM gallery WHERE pageid='".$a."' ORDER BY id DESC LIMIT $co OFFSET ".$fr);
while($r2=mysqli_fetch_array($q2)){
?>
<div class="col-md-12 NOP LIS">
	<div class="col-md-10 NOP">
		<img src="<?=str_replace("uploads","thumbs",$r2["img"])?>" />
	</div>
	<div class="col-md-2 NOP">
		<a class="btn btn-default DGA" n="gallery" d="<?=$r2["id"]?>">Delete</a>
	</div>
</div>
<?php
}
?>
			</div>
			&nbsp;
	<?php
	$q3=mysqli_query($con,"SELECT * FROM gallery WHERE id>0 AND pageid='".$a."' ".$WKE);
	$tot=ceil(mysqli_num_rows($q3)/$co);
	?>
		<div class="col-md-12">
			<ul class="pagination">
			<?php
			if($tot>1){
			?>
				<li class="first"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$i?>">First</a>
				</li>
				<li class="previous"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=($ACP-1)?>"><i class="fa fa-angle-left"></i></a>
				</li>
			<?php
			}
			?>
			<?php
			for($i=1;$i<=$tot;$i++){
			?>
				<li class="<?=($ACP==$i?"active":"")?>"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$i?>"><?=$i?></a>
				</li>
			<?php
			}
			?>
			<?php
			if($tot<$ACP&&$tot!=0){
			?>
				<li class="next"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=($ACP+1)?>"><i class="fa fa-angle-right"></i></a>
				</li>
				<li class="last"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$tot?>">Last</a>
				</li>
			<?php
			}
			?>
			</ul>
		</div>
		</div>
		<div <?=$r1p["ptype"]==3?'style="display:block"':''?> class="PST"><br>
			<label>Posts</label>
			<br>
			<i>Post Title</i>
			<input class="form-control PTI" id="PTI" placeholder="Post Title" ></input>
			<br>
			<i>Post thumbnail</i>
			<br>
			<div class="input-append">
				<div class="col-md-6 NOP">
					<input id="YDP" class="form-control" placeholder="Image link" type="text" >
				</div>
				&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDP&relative_url=0')" class="btn iframe-btn btn-default" type="button">Select</a>

				<script>
				function open_popup(url){var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);}
				</script>
			</div>
			<br>
			<i>Post Text</i>
			<textarea  class="ADP TIN" id="ADLP" ></textarea>
			<br>
			<div class="btn btn-default ADP">Add Post</div>
			<br>&nbsp;
			<div class="col-md-12 NOP">
<?php
$q2=mysqli_query($con,"SELECT * FROM posts WHERE pageid='".$a."' ORDER BY id DESC LIMIT $co OFFSET ".$fr);
while($r2=mysqli_fetch_array($q2)){
?>
<div class="col-md-12 NOP LIS">
	<div class="col-md-2">
		<img src="<?=str_replace("uploads","thumbs",$r2["img"])?>" />
	</div>
	<div class="col-md-8 NOP">
		<?=$r2["title"]?>
	</div>
	<div class="col-md-2 NOP">
		<a class="btn btn-default DGA" n="posts" d="<?=$r2["id"]?>">Delete</a>
	</div>
</div>
<?php
}
?>
			</div>
	<?php
	$q3=mysqli_query($con,"SELECT * FROM posts WHERE id>0 AND pageid='".$a."' ".$WKE);
	$tot=ceil(mysqli_num_rows($q3)/$co);
	?>
		<div class="col-md-12">
			<ul class="pagination">
			<?php
			if($tot>1){
			?>
				<li class="first"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$i?>">First</a>
				</li>
				<li class="previous"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=($ACP-1)?>"><i class="fa fa-angle-left"></i></a>
				</li>
			<?php
			}
			?>
			<?php
			for($i=1;$i<=$tot;$i++){
			?>
				<li class="<?=($ACP==$i?"active":"")?>"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$i?>"><?=$i?></a>
				</li>
			<?php
			}
			?>
			<?php
			if($tot<$ACP&&$tot!=0){
			?>
				<li class="next"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=($ACP+1)?>"><i class="fa fa-angle-right"></i></a>
				</li>
				<li class="last"><a href="?page=page&id=<?=$a?>&key=<?=$key?>&p=<?=$tot?>">Last</a>
				</li>
			<?php
			}
			?>
			</ul>
		</div>
		</div>
		<div <?=$r1p["ptype"]==3?'style="display:none"':''?> class="PGT">
		<br>
		<label>Page Text GEO</label>
		<textarea  class="IN A3 TIN" n="textge" id="ADL1"><?=$r1p["textge"]?></textarea>
		<br>
		<label>Page Text ENG</label>
		<textarea  class="IN A5 TIN" n="texten" id="ADL4"><?=$r1p["texten"]?></textarea>
		</div>
		<br>
	</div>
	<br>&nbsp;
<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: ".TIN",
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
				  func("updatepage",ed.getContent(),$(".page").val(),$("#"+ed.id).attr("n"));
			  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}

	});
});

</script>
<script src="js/tinymce/tinymce.min.js"></script>
