<?php
$a=(int)$_POST['a'];
$b=mysqli_real_escape_string($con,$_POST['b']);
$c=(int)$_POST['c'];
$d=mysqli_real_escape_string($con,$_POST['d']);
mysqli_query($con,"DELETE FROM seo WHERE id='$a' ");
$kw=mysqli_query($con,"SELECT id, keywords FROM seo WHERE table_column='keyword' AND page_name='$d' AND table_id='$c' AND table_name='$b' ");
  if(mysqli_num_rows($kw)>0)
  {
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>' t='<?=$b ?>' tn='<?=$d ?>'  pid='<?=$c?>'>
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