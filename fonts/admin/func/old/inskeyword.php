<?php

  $a=mysqli_real_escape_string($con,$_POST['a']);
  $b=mysqli_real_escape_string($con,$_POST['b']);
  $c=(int)$_POST['c'];
  $d=mysqli_real_escape_string($con,$_POST['d']);
  mysqli_query($con,"INSERT INTO seo SET page_name='$a', page_column='$b', page_id='$c', keywords='$d' ");
  
  $kw=mysqli_query($con,"SELECT id, keywords FROM seo WHERE page_id='$c' AND page_column='$b'  AND page_name='$a' ");
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>'  t='<?=$a ?>' pid='<?=$c ?>' >
				     <p> <?=$rkw['keywords'] ?> <p>
				  </div>
      		  <?php		  
			  }
  

?>