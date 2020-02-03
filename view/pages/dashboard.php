<?php
session_start();
if(isset($_SESSION['MGuserID'])){
	$start=$_GET["start"];
	$end=$_GET["end"];
	if(!isset($_GET["start"])){
		$start="12/12/2016";
	}
	if(!isset($_GET["end"])){
		$end=date("m/d/Y",time());
	}
	$dstart=$start;
	$dend=$end;
	$ustart=strtotime($dstart);
	$uend=strtotime($dend);	
	$ACP=1;
	if($_REQUEST["p"]>0){
		$ACP=$_REQUEST["p"];
	}
	$fr=($ACP-1)*30;
	
?>
<?php
if($r12["dashboard"]==1){
	$q2=mysqli_query($con,"SELECT COUNT(Id) as scores FROM scoring WHERE date>='".$ustart."' AND date<='".$uend."' AND LENGTH(batchidco)>4");
$r2=mysqli_fetch_array($q2);

?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css"/>
      <script src="https://qcash.ge/supr/plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				<br>
					<label class="col-lg-1 col-md-1 control-label" for="">Date range</label>
					<div class="col-lg-3 col-md-3">
						<div class="input-daterange input-group">
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" class="form-control startdate" value="<?=$start?>" name="start">
							<span class="input-group-addon">to</span>
							<input type="text" class="form-control enddate" value="<?=$end?>" name="end">					
						</div>					
					</div>
					<button type="button" class="btn btn-success mr5 mb10 filt">გაფილტრვა</button>
					მაგალითად: თუ გვინდა 18 მარტი, მაშინ ვირჩევთ 18 მარტიდან 19 მარტამდე
				</div>	
				<br>				
				<br>				
			</div>
			<div class="col-md-2 col-md-2 col-sm-2 col-xs-6 DAS">
				<!-- col-md-3 start here -->
				<a href="#" class="chartShortcuts">
					<span class="head">Scored</span>
					<span class="number"><?=$r2["scores"]?>  </span>
				</a>
			</div>
			<div class="col-md-2 col-md-2 col-sm-2 col-xs-6 DAS">
				<!-- col-md-3 start here -->
				<a href="#" class="chartShortcuts">
					<span class="head">Creditinfo</span>
					<span class="number"><?=$r2["scores"]*2?>  </span>
				</a>
			</div>
	</div>
</div>
<script>
$(function(){
	$(".input-daterange").datepicker();
	$(document).on("click",".filt",function(){
		window.location.href="?page=dashboard&start="+$(".startdate").val()+"&end="+$(".enddate").val();
	});
});
</script>
<?php
}
?>
<?php
}
?>