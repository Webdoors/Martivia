<?php
session_start();
if(isset($_SESSION['GuserID'])){
	include("imgresizer.php");
	$T=time();
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	if(!file_exists("../uploads/product/".$a)){
		mkdir("../uploads/product/".$a, 0777, true);
	}
	$ident=$T;
	$im="b";
	$allowedExts = array("jpg","JPEG","JPG","GIF","gif","pjpeg","jpeg", "gif", "png");
	$ext = end(explode(".", $_FILES[$im]["name"]));
	if ((($_FILES[$im]["type"] == "image/gif")
			|| ($_FILES[$im]["type"] == "image/jpeg")
			|| ($_FILES[$im]["type"] == "image/JPEG")
			|| ($_FILES[$im]["type"] == "image/JPG")
			|| ($_FILES[$im]["type"] == "image/GIF")
			|| ($_FILES[$im]["type"] == "image/jpg")
			|| ($_FILES[$im]["type"] == "image/PNG")
			|| ($_FILES[$im]["type"] == "image/png")
			|| ($_FILES[$im]["type"] == "image/pjpeg"))
			&& in_array($ext, $allowedExts))
	{
		if ($_FILES[$im]["error"] > 0){}
		else{
			if(file_exists("../uploads/product/".$a."/".$ident.".".$ext)){
			}
			else{
				move_uploaded_file($_FILES[$im]["tmp_name"],"../uploads/product/".$a."/".$ident.".".$ext);
			}
			$image=new SimpleImage();
			$image->load("../uploads/product/".$a."/".$ident.".".$ext);
			$image->resizeToWidth(1920);
			$image->save("../uploads/product/".$a."/".$ident."_1920.".$ext);
			$img1="uploads/product/".$a."/".$ident."_1920.".$ext;
			$image->load("../uploads/product/".$a."/".$ident.".".$ext);
			$image->resizeToWidth(720);
			$image->save("../uploads/product/".$a."/".$ident."_720.".$ext);	
			$img2="uploads/product/".$a."/".$ident."_720.".$ext;
			$image->load("../uploads/product/".$a."/".$ident.".".$ext);
			$image->resizeToWidth(113);
			$image->save("../uploads/product/".$a."/".$ident."_113.".$ext);
			$img3="uploads/product/".$a."/".$ident."_113.".$ext;			
			$image->load("../uploads/product/".$a."/".$ident.".".$ext);
			$image->resizeToWidth(97);
			$image->save("../uploads/product/".$a."/".$ident."_97.".$ext);
			$img4="uploads/product/".$a."/".$ident."_97.".$ext;			
			$image->load("../uploads/product/".$a."/".$ident.".".$ext);
			$image->resizeToWidth(61);
			$image->save("../uploads/product/".$a."/".$ident."_61.".$ext);	
			$img5="uploads/product/".$a."/".$ident."_61.".$ext;				
			$image->load("../uploads/product/".$a."/".$ident.".".$ext);
			$image->resizeToWidth(220);
			$image->save("../uploads/product/".$a."/".$ident."_220.".$ext);	
			$img6="uploads/product/".$a."/".$ident."_220.".$ext;	

			mysqli_query($con,"INSERT INTO productimgs SET name='".$_FILES[$im]["name"]."',productid='".$a."',ident='".$ident."',ext='".$ext."'");				
			echo 1;
		}
	}	
}
?>