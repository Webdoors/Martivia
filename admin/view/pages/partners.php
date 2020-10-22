<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$fr=($ACP-1)*30;
?>
<div class="container-fluid">
<div class="col-md-12">
	<h2 class="w-100  text-center my-4">პარტნიორები</h2>
	<div class="bgbox ctg row">
	<div class="D2 col-3 pl-0" ><input placeholder="პარტნიორის სახელი" class="ADN form-control"/></div>
	<div class="D6 col-2 pr-0" ><input value="დამატება" type="button" class="APA btn btn-primary"/></div>
<div class="col-md-12 px-0 pb-2 LIST">
<br>
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>

			<th>id</th>
			<th>name</th>
			<th>img</th>
			<th>link</th>
			<th>წაშლა</th>

			</tr>
		</thead>
		<tbody>
	
<?php
$q2=mysqli_query($con,"SELECT * FROM partners ORDER BY id DESC");
			while($r2=mysqli_fetch_array($q2)){
?>

			<tr>
	<th><?=$r2["id"]?></th>
				<td><input class="form-control UPT2" placeholder="სახელი" d="<?=$r2["id"]?>" t="partners" n="name" value="<?=$r2["name"]?>"/></td>
			<th>
		<div class="input-append row mx-2">
			<br><div class="col-md-6 NOP">
				<input id="YDA<?=$r2["id"]?>" class="form-control UPT2" d="<?=$r2["id"]?>" t="partners" n="img" placeholder="სურათის ლინკი" type="text" value="<?=$r2["img"]?>">			
			</div>
			&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA<?=$r2["id"]?>&relative_url=0')" class="btn iframe-btn btn-primary" type="button">Select</a>
		</div>			
			</th>
			<th><input class="form-control UPT2" placeholder="ლინკი" d="<?=$r2["id"]?>" t="partners" n="link" value="<?=$r2["link"]?>"/></th>
				<td><div class="btn btn-outline-danger DGA" n="partners" d="<?=$r2["id"]?>">წაშლა</div></td>
			</tr>
<?php
	}
?>
		</tbody>
</table>
</div>

<div class="col-12 px-0 d-none GRID">
	<div class="row">
        <?php
        $q2=mysqli_query($con,"SELECT * FROM categories ORDER BY id DESC"); // amis optimizacia sheidzleba
        while($r2=mysqli_fetch_array($q2)) {
            ?>
            <div class=" col-3">
                <div class="Cate p-2">
                    <a href="<?= "?page=", $page, "&id=", $r2["id"] ?>"><?= $r2["name"] ?></a>
                    <div class="btn dlt DEL"><h4><i class="fa fa-trash" aria-hidden="true" t="categories"
                                                    d="<?= $r2["id"] ?>"></i></h4></div>
                </div>
            </div>
        <?php
        }
        ?>
	</div>
</div>

</div>
</div>
</div>
