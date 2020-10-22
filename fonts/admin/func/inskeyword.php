<?php

  $a=mysqli_real_escape_string($con,$_POST['a']);
  $b=mysqli_real_escape_string($con,$_POST['b']);
  $c=(int)$_POST['c'];
  $d=mysqli_real_escape_string($con,$_POST['d']);
  $e=mysqli_real_escape_string($con,$_POST['e']);
  mysqli_query($con,"INSERT INTO seo SET page_name='$e', table_name='$a', table_column='$b', table_id='$c', keywords='$d' ");
  
  $kw=mysqli_query($con,"SELECT id, keywords FROM seo WHERE table_id='$c' AND table_column='$b'  AND page_name='$e'  AND table_name='$a'");
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>'  t='<?=$a ?>' tn='<?=$e ?>' pid='<?=$c ?>' >
				     <p> <?=$rkw['keywords'] ?> <p>
				  </div>
      		  <?php		  
			  }
  

?>