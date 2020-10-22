<div class="container-fluid">
	<div class="row NOP">
       <div class='col-sm-12'>
	     <div class='row my-2'>
		   <div class='col-sm-4'>
	          <h4>კონტაქტები</h4>
		   </div>
		 </div>
	   </div>
    </div>
</div>
<?php
  $cc=mysqli_query($con,"SELECT t1.*, (SELECT column_value FROM langs WHERE table_column='address' AND table_id=t1.id AND table_name='about' AND short_name='en' ) AS addressen, 
		                              (SELECT column_value FROM langs WHERE table_column='address' AND table_id=t1.id AND table_name='about' AND short_name='ru' ) AS addressru
									  FROM about AS t1");
  $rcc=mysqli_fetch_assoc($cc);
?>
<div class='col-sm-12'>
 
    <label>მისამართი</label>
   <input type='text' placeholder='მისამართი' class="form-control UPTBL"  n='address'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['address'] ?>' />
    <label>მისამართი eng</label>
   <input type='text' placeholder='მისამართი eng' class="form-control UPTBL"  ln='en' n='address'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['addressen'] ?>' />
    <label>მისამართი ru</label>
   <input type='text' placeholder='მისამართი ru' class="form-control UPTBL" ln='ru' n='address'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['addressru'] ?>' />
   <br/> 
   <label>ელფოსტა</label>
   <input type='text' placeholder='ელ ფოსტა' class="form-control UPTBL"  n='email'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['email'] ?>' />
   <br/>
   <label>საკონტაქტო ელ ფოსტა</label>
   <input type='text' placeholder='საკონტაქტო ელ ფოსტა' class="form-control UPTBL"  n='contact_email'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['contact_email'] ?>' />
   <br/>   
   <label>ტელეფონი</label>
   <input type='text' placeholder='ტელეფონი' class="form-control UPTBL"  n='tel'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['tel'] ?>' />
   <br/>

   <label>ტელეფონი</label>
   <input type='text' placeholder='ტელეფონი' class="form-control UPTBL"  n='tel'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['tel'] ?>' />
   <br/>   
   
   <label>სოციალური ქსელები</label>
   <input type='text' placeholder='facebook' class="form-control UPTBL"  n='facebook'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['tel'] ?>' />
   <br/> 

   <input type='text' placeholder='instagram' class="form-control UPTBL"  n='instagram'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['tel'] ?>' />
   <br/> 

   <input type='text' placeholder='youtube' class="form-control UPTBL"  n='youtube'  d='<?=$rcc['id'] ?>' t='about' value='<?=$rcc['tel'] ?>' />
   <br/>
   
</div>