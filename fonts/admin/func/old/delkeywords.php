<?php
$a=(int)$_POST['a'];
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=(int)$_POST['c'];
mysqli_query($con,"DELETE FROM seo WHERE id='$a' ");
$kw=mysqli_query($con,"SELECT id, keywords FROM seo WHERE page_column='keyword' AND page_name='$b' AND page_id='$c' ");
  if(mysqli_num_rows($kw)>0)
  {
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>' t='<?=$b ?>' pid='<?=$c?>'>
				     <p> <?=$rkw['keywords'] ?> <p>
				  </div>
      		  <?php		  
			  }
  }
  else
  {
 echo 0;  
  }
?>