<?php
 $seo=mysqli_query($con,"SELECT t1.* , t1.column_value AS description, (SELECT column_value FROM langs WHERE table_name='seoabout' AND table_column='description' AND short_name='en' ) AS endescription,
(SELECT column_value FROM langs WHERE table_name='seoabout' AND table_column='description' AND short_name='ru' ) AS rudescription
 FROM seo AS t1 WHERE t1.page_name='about' AND t1.page_column='description' ");
 if(mysqli_num_rows($seo)==0)
 {
	 mysqli_query($con,"INSERT INTO seo SET page_name='about', page_column='description' "); 
	 ?>
	   <script type='text/javascript'>
	    location.reload();
	   </script>
	 <?php
 }
  $ln=mysqli_query($con,"SELECT * FROM langs WHERE table_name='seoabout' AND table_column='description' AND short_name='en' ");
 if(mysqli_num_rows($ln)==0)
 {
	 mysqli_query($con,"INSERT INTO langs SET table_name='seoabout' , name='english', table_column='description', short_name='en'  ");
 }
  $ln1=mysqli_query($con,"SELECT * FROM langs WHERE table_name='seoabout' AND table_column='description' AND short_name='ru' ");
 if(mysqli_num_rows($ln1)==0)
 {
	 mysqli_query($con,"INSERT INTO langs SET table_name='seoabout' , name='russian', table_column='description', short_name='ru'  ");
 }
 $rseo=mysqli_fetch_assoc($seo);
 
?>
<div class="container">
 <br/>
   <div class="col-sm-10 mt-3 p-0">
    <div class='row'>
	<div class='col-sm-2'>

	    <button class='btn btn-danger ltab' d='1' > ქართული</button>

	</div>
	<div class='col-sm-2' >

	    <button class='btn btn-success ltab' d='2' >  ინგლისური</button>

	</div>
	<div class='col-sm-2' >

	    <button class='btn btn-danger  ltab' d='3'>  რუსული</button>

	</div>
	</div>
   </div>


<h3 class="title mt-3">
    <span>
       სეო შესახებ
    </span>
</h3>

<div class="row">
	<div class="col-sm-12 my-3">



            <label for="pdf">keywords SEO </label>

<div class="input-append row">
					<div class="col-md-3">
						<input  class="form-control nsk"  placeholder="keywords" type="text" >
					</div>
				  <button class="btn iframe-btn btn-outline-primary insk" t="about" n="keyword" d="0">Select</button>
				</div>


<br/>
  <div class='ajaxkeywords w-100'>
       <?php
	          $kw=mysqli_query($con,"SELECT * FROM seo WHERE page_column='keyword'  AND page_name='about' ");
			  while($rkw=mysqli_fetch_assoc($kw))
			  {
				  ?>
				  <div class='dlkw' d='<?=$rkw['id'] ?>' t='about' pid='0' >
				     <p> <?=$rkw['keywords'] ?> <p>
				  </div>
      		  <?php		  
			  }
	   ?>
  </div>
<br/>
<div class='container-tab w-100'  style='overflow:hidden'>
		<div class='enebi' d='1' style='display:none'>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">Description GE SEOO</label>

                 <textarea class="form-control" rows="4" id="ADDESGE" placeholder="Description GEO for SEO"><?=$rseo["description"]?></textarea>

           </div>
		 </div>

        <div class='enebi' d='2' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">Description EN SEOG</label>

               <textarea class="form-control" rows="4" id="ADDESENG" placeholder="Description ENG for SEO"><?=$rseo["endescription"]?></textarea>

            </div>
		</div>
		<div class='enebi' d='3' style='display:none'>
          <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">Description RU SEO</label>

               <textarea class="form-control"rows="4" id="ADDESRU" placeholder="Description RU for SEO"><?=$rseo["rudescription"]?></textarea>

          </div>
        </div>
</div>

     <div class="submit my-4">
        <button class="btn btn-outline-success SEO" n="description" d="0" t="about">დამახსოვრება</button>
    </div>
	</div>

	</div>
	
	
	
		
	
	
</div>
</div>