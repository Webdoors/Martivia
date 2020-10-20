<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$fr=($ACP-1)*30;
?>
<div class="container-fluid">
	<div class="col-md-12 LIS H">
		<div class="D1" style="width:60px">id</div>
		<div class="D2" style="width:180px">Category</div>
		<div class="D3" style="width:180px">ItemNum</div>
		<div class="D6" style="width:180px">Delete/Add</div>	
	</div>
	<div class="col-md-12 LIS H">
		<div class="D1" style="width:60px"></div>
		<div class="D2" style="width:180px"><input placeholder="Name of category" class="ADN"/></div>
		<div class="D2" style="width:180px"></div>
		<div class="D6" style="width:180px"><input value="Add" type="button" class="ACA"/></div>	
	</div>        
	<?
	$q1=mysqli_query($con,"SELECT * FROM treecat ");
	$r1=mysqli_fetch_array($q1);
	$tree=json_decode($r1["tree"],true);
	

?>
<div class="dd" id="nestable">


<?php
lis($tree,$con);
	function lis($tree,$con){
?>
<ol class="dd-list">
<?php		
		for($i=0;$i<count($tree);$i++){
			$q2=mysqli_query($con,"SELECT * FROM categories WHERE id='".$tree[$i]["id"]."'");
			$r2=mysqli_fetch_array($q2);		
?>
	<li class="dd-item" data-id="<?=$tree[$i]["id"]?>">
	<div class='dd-action pull-right RMB' type='button' data-action='remove' title='Remove'>
		<span class='glyphicon glyphicon-remove'></span>
	</div>
	<div class='dd-action pull-right EMB' d="<?=$tree[$i]["id"]?>" type='button' data-action='edit' title='edit'>
		<span class='glyphicon glyphicon-edit'></span>
	</div>		
	<div class="dd-handle"><?=$r2["name"]?></div>

<?php
			if(array_key_exists("children",$tree[$i])){	
				lis($tree[$i]["children"],$con);
			}
?>
	</li>
<?php			
				
			
		}	
?>
</ol>
<?php		
	}
	?>
</div>
		<textarea class="hidden" id="nestable-output"></textarea>
</div>
<script src="js/jquery.nestable.js"></script>
<script>
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
			console.log(list.nestable('serialize'));
        } else {
            output.val('JSON browser support required for this demo.');
        }
		func("treecat",window.JSON.stringify(list.nestable('serialize')));
    };
$(function(){

    $('#nestable').nestable({
        group: 1,
		customActions   : {
			'remove'    : function(item,button) {
				if( item.hasClass('dd-deleted') ) {
					item.data('isDeleted',false).removeClass('dd-deleted');
					button.html('<i class="icon-remove"></i>');
				}
				else {
					item.data('isDeleted',true).addClass('dd-deleted');
					button.html('undo');
				}
			}
		}
    })
    .on('change', updateOutput);
	updateOutput($('#nestable').data('output', $('#nestable-output')));	
});	
</script>
