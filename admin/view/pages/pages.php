<?php
	$ACP=1;
	$co=20;
	if($_REQUEST["p"]>0){
		$ACP=mysqli_real_escape_string($con,$_REQUEST["p"]);
	}
	$fr=($ACP-1)*$co;
	$key=urldecode(mysqli_real_escape_string($con,$_GET["key"]));
	if($key!=""){
		$WKE=" AND (titleeng LIKE '%".$key."%' OR titlerus LIKE '%".$key."%' OR titlegeo LIKE '%".$key."%')";
	}
?>
<div class="col-md-12 MPA MTB">
	<div class="col-md-12">
		<br>
		<div class="btn btn-default UNE">Add Page</div>
	</div>
	<div class="col-md-12">
		<br>&nbsp;
			<div class="col-md-12 NOP">
				<div class="col-md-11 NOP">
					<input class="form-control fil7" value="<?=$key?>" placeholder="Search page"/>
				</div>
				<div class="col-md-1">
					<a href="?page=pages&key=<?=$key?>" class="btn btn-default key">ძებნა</a>
				</div>
			</div>
		<br>
		<br>	
<?php
$q1=mysqli_query($con,"SELECT * FROM pages WHERE id>0 $WKE ORDER BY id DESC LIMIT $co OFFSET ".$fr);
while($r1=mysqli_fetch_array($q1)){
?>
	<div class="col-md-12 LIS">
		<div class="col-md-8"><?=$r1["titlegeo"]?></div>
		<div class="col-md-2"><a href="?page=page&id=<?=$r1["id"]?>"class="btn btn-default">რედაქტირება</a></div>
		<div class="col-md-2"><div class="btn btn-default DNE"d="<?=$r1["id"]?>">წაშლა</div></div>
	</div>
<?php
}
?>
<?php
$q3=mysqli_query($con,'SELECT * FROM pages WHERE id>0 '.$WKE);
$tot=ceil(mysqli_num_rows($q3)/$co);
?>
	<div class="col-md-12">
		<ul class="pagination">
		<?php
		if($tot>1){
		?>
			<li class="first"><a href="?page=pages&key=<?=$key?>&p=<?=$i?>">First</a>
			</li>
			<li class="previous"><a href="?page=pages&key=<?=$key?>&p=<?=($ACP-1)?>"><i class="fa fa-angle-left"></i></a>
			</li>
		<?php
		}
		?>
		<?php
		for($i=1;$i<=$tot;$i++){
		?>
			<li class="<?=($ACP==$i?"active":"")?>"><a href="?page=pages&key=<?=$key?>&p=<?=$i?>"><?=$i?></a>
			</li>
		<?php	
		}
		?>	
		<?php	
		if($tot<$ACP&&$tot!=0){
		?>	
			<li class="next"><a href="?page=pages&key=<?=$key?>&p=<?=($ACP+1)?>"><i class="fa fa-angle-right"></i></a>
			</li>
			<li class="last"><a href="?page=pages&key=<?=$key?>&p=<?=$tot?>">Last</a>
			</li>
		<?php	
		}
		?>	
		</ul>
	</div>
	</div>
</div>
<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: "textarea",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],

	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
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
   
   external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
	  
	});	
});

</script>
<script src="js/tinymce/tinymce.min.js"></script>