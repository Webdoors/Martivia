<link rel="stylesheet" href="js/swiper/dist/css/swiper.min.css">
<div class="container-fluid CFL NOP">
	<div class="col-md-12 text-center NOP">
<div class="col-md-12 NOP MTOP PTOP">
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
<?php
$q1=mysqli_query($con,"SELECT * FROM slider ORDER BY position DESC");
while($r1=mysqli_fetch_array($q1)){
?>
            <div class="swiper-slide" >
				<img src="<?=$r1["link"]?>"/>
				<div class="SLL CP"><?=$r1["bigtext"]?><br><span class="SMT"><?=$r1["smalltext"]?></span>&nbsp;<a href="tel:tel:+995322726556">Book Now</a></div>			
			</div>
<?php
}
?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-black"></div>
        <div class="swiper-button-prev swiper-button-black"></div>
    </div>
</div>	
	</div>
</div>
<script src="js/swiper/dist/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
		effect:"fade",
		autoplay:3000,
		speed:1000	,
		autoHeight:true
    });



</script>
