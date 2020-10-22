<?php
 $seo=mysqli_query($con,"SELECT t1.* , t1.column_value AS description FROM seo AS t1 WHERE t1.page_name='home' AND t1.table_column='description' ");
 if(mysqli_num_rows($seo)==0)
 {
	 mysqli_query($con,"INSERT INTO seo SET page_name='home', table_column='description' "); 
	 ?>
	   <script type='text/javascript'>
	    location.reload();
	   </script>
	 <?php
 }

 $rseo=mysqli_fetch_assoc($seo);
 
?>

<div class="container">
 <br/>



<h3 class="title mt-3">
    <span>
       სეო მთავარი გვერდი
    </span>
</h3>

<div class="row">
	<div class="col-sm-12 my-3">



            <label for="pdf">keywords SEO </label>

<div class="input-append row">
					<div class="col-md-3">
						<input  class="form-control nsk"  placeholder="keywords" type="text" >
					</div>
				  <button class="btn iframe-btn btn-outline-primary insk" t="" pg='home' n="keyword" d="0">Select</button>
				</div>


<br/>
  <div class='ajaxkeywords w-100' style='overflow:hidden'>
       <?php
	          $kw=mysqli_query($con,"SELECT * FROM seo WHERE table_column='keyword'  AND page_name='home' ");
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>' t='' pg='home' pid='0' >
				     <p> <?=$rkw['keywords'] ?> <p>
				  </div>
      		  <?php		  
			  }
	   ?>
  </div>
<br/>
<div class='container-tab w-100' >
		<div class='enebi' d='1' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">Description GE SEOO</label>

                 <textarea class="form-control" rows="4" id="ADDESGE" placeholder="Description GEO for SEO"><?=$rseo["description"]?></textarea>

           </div>
		 </div>

      

</div>
  <div class="submit my-4">
        <button class="btn btn-outline-success SEO" n="description" d="0" t="home" >დამახსოვრება</button>
    </div>
	</div>
</div>
</div>