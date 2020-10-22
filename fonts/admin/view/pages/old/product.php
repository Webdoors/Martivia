<?php
$pid=mysqli_real_escape_string($con,$_REQUEST["id"]);
$q1=mysqli_query($con,"SELECT * FROM products WHERE id='".$pid."'");
$r1=mysqli_fetch_array($q1);
$q3=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$pid."' AND main=1");
$r3=mysqli_fetch_array($q3);
?>
<input class="pid" type="hidden" value="<?=$pid?>"/>
<div class="col-md-12">
	<div class="col-md-8">
		<div class="col-md-5 NOP">
			<div class="IMCO"><img src="uploads/product/<?=$pid."/".$r3["ident"].".".$r3["ext"]?>" alt="Main image"/> </div>
		</div>	
		<div class="col-md-7">
		<br>
			<label>Upload Images:</label> <input type="file" class="PIM" id="PIM"/><br><input type="button" value="Upload" class="UPL"/>
			<br>
			<br>
			<div class="col-md-12 NOP">
<?php
$q2=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$pid."' ORDER BY position ASC, id ASC ");
while($r2=mysqli_fetch_array($q2)){

?>
				<div class="col-md-12 NOP IME">
					<img src="uploads/product/<?=$pid."/".$r2["ident"]."_113.".$r2["ext"]?>"/>										
					&nbsp;&nbsp;<label>Pos</label>&nbsp;&nbsp;<input class="form-control POS" d="<?=$r2["id"]?>" value="<?=$r2["position"]?>"/>
					&nbsp;&nbsp;<input type="button" class="DEI" d="<?=$r2["id"]?>" value="Delete"/>
<?php
	if(!$r2["main"]){
?>					
					&nbsp;&nbsp;  <input type="button" class="SIM" d="<?=$r2["id"]?>" <?=$r2["main"]?"disabled":""?> value="Set as Main"/>
<?php
	}
?>	
				</div>			
<?php

}
?>
			</div>
		</div>	
	</div>	
	<div class="col-md-4">
<br>
		<label>Product ID</label><input class="form-control len" placeholder="Item name" value="<?=$r1["id"]?>"/>
		<br>
		<label>Active</label>   <input type="checkbox" class="CHK" <?=$r1["active"]?"checked":""?> d="active"/>
		<br>
		<br>
		<label>Name</label><input class="form-control len" d="name" placeholder="Item name" value="<?=$r1["name"]?>"/>
		<br>
		<label>Price in USD</label><input class="form-control len" d="price" placeholder="price"  value="<?=$r1["price"]?>"/>
		<br>
		<label>Sprice in USD</label><input class="form-control len" d="sprice" placeholder="Sale price"  value="<?=$r1["sprice"]?>"/>
		<br>
		<label>Sale</label>   <input type="checkbox" class="CHK" <?=$r1["sale"]?"checked":""?> d="sale"/>
		<br>
		<br>
		<label>Category</label> <select class="form-control len" d="category">
			<option value="0">Select Category</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM categories");
while($r4=mysqli_fetch_array($q4)){
?>
			<option <?=$r1["category"]==$r4["id"]?"selected":""?> value='<?=$r4["id"]?>'><?=$r4["name"]?></option>
<?php
}
?>
		</select>
		<br>
		<label>Collection</label><select class="form-control len" d="collection">
			<option value="0">Select Collection</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM collections");
while($r4=mysqli_fetch_array($q4)){
?>
			<option <?=$r1["collection"]==$r4["id"]?"selected":""?> value='<?=$r4["id"]?>'><?=$r4["name"]?></option>
<?php
}
?>
		</select>
		<br>
		<label>Size type</label><select class="form-control len" d="sizetype">
			<option value="0">Select size type</option>
			<option <?=$r1["sizetype"]==1?"selected":""?> value='1'>Nummeric</option>
			<option <?=$r1["sizetype"]==2?"selected":""?> value='2'>Letter</option>
		</select>
		<br>
    <div class="col-md-6 div1 size">
        <label style="">Available sizes:</label><br>
        <input type="checkbox" class="CHK" d="is_size_xs" t="chb" n="is_size_xs" id="is_size_xs"<?=($r1['is_size_xs']==1?' checked="checked"':'')?> />
        <label>XS</label>
        <input type="text" class="txt number INS len" d="size_xs" value="<?=$r1['size_xs']?>" id="size_xs" />
        <br>
        <input type="checkbox" class="CHK" d="is_size_s" t="chb" n="is_size_s" id="is_size_s"<?=($r1['is_size_s']==1?' checked="checked"':'')?> />
        <label>S</label>
        <input type="text" class="txt number INS len" d="size_s" value="<?=$r1['size_s']?>" id="size_s" />
        <br>
        <input type="checkbox" class="CHK" d="is_size_l" t="chb" n="is_size_l" id="is_size_l"<?=($r1['is_size_l']==1?' checked="checked"':'')?> />
        <label>L</label>
        <input type="text" class="txt number INS len" d="size_l" value="<?=$r1['size_l']?>" id="size_l" />
        <br>
        <input type="checkbox" class="CHK" d="is_size_m" t="chb" n="is_size_m" id="is_size_m"<?=($r1['is_size_m']==1?' checked="checked"':'')?> />
        <label>M</label>
        <input type="text" class="txt number INS len" d="size_m" value="<?=$r1['size_m']?>" id="size_m" />
        <br>
        <input type="checkbox" class="CHK" d="is_size_xl" t="chb" n="is_size_xl" id="is_size_xl"<?=($r1['is_size_xl']==1?' checked="checked"':'')?> />
        <label>XL</label>
        <input type="text" class="txt number INS len" d="size_xl" value="<?=$r1['size_xl']?>" id="size_xl" />
        <br>
        <input type="checkbox" class="CHK" d="is_size_xxl" t="chb" n="is_size_xxl" id="is_size_xxl"<?=($r1['is_size_xxl']==1?' checked="checked"':'')?> />
        <label>XXL</label>
        <input type="text" class="txt number INS len" d="size_xxl" value="<?=$r1['size_xxl']?>" id="size_xxl" />
    </div>
    <div class="col-md-6 div1 size">
        <label >Available sizes(in numbers):</label><br /><? for($i=34;$i<=47;$i++){ ?> 
        <input type="checkbox" class="" id="is_size_<?=$i?>"<?=($r1["id"]==0||$r1['is_size_'.$i]?' checked="checked"':'')?> />
        <label><?=$i?></label>
        <input type="text" class="txt number INS" value="<?=($r1["id"]==0?30:$r1['size_'.$i])?>" n="size_<?=$i?>" id="size_<?=$i?>" /> 
         <? }?>
		 <br>
<br>
<br>
    </div>
	</div>	
</div>
