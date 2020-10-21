<div class="col-md-12 NOP">
	<div class="col-md-12 NOP BGR" >
		<div class="col-md-6" >
			<div class="col-md-12 HDL SMT" >Contact Us</div>
			<div class="col-md-12" ><div class="LAB">Better yet, see us in person!</div></div>
			<div class="col-md-12" >We love our customers, so feel free to visit during normal business hours.</div>
			<div class="col-md-12" >
				<div class="col-md-6 NOP" >
				<div class="LAB">Kikala Studio</div>
				8 Beliashvili Street, Tbilisi, Georgia 0159<br>
				<a href="tel:+995322142178">tel:+995322142178</a>

				<div class="CNO CP"><a href="tel:+995322142178">Book Now</a></div>
				</div>
				<div class="col-md-6 NOP SMT" >
				<div class="LAB">Hours</div>
				Monday - Friday: 11am - 7pm<br>

				Saturday: By appointment<br>

				Sunday: By Appointment<br>				
				</div>
			</div>
		</div>
		<div class="col-md-6 NOP" >
			<div id="MAP"></div>
		</div>
	</div>
	<div class="col-md-12 BLD DIV WHI" >
		<div class="col-md-6" >
Copyright © 2018 Kikala Studio - All Rights Reserved.
		</div>
		<div class="col-md-6 text-right" >
Provided by <a target="_blank" href="http://webdoors.ge">Webdoors</a>
		</div>
	</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js?v=12477"></script>
<script src="http://kikalastudio.com/js/bootbox.min.js"></script>
<script>
$( window ).load(function(){
	initialize();
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUQ4b7Kl_y1X_W73Zpttmj0erbi7xx2mc"></script>
<script>
var map=0;
var marker;
var infowindow;
var vake1=new google.maps.LatLng(41.7788035,44.7805803);

var myCenter=new google.maps.LatLng(41.7788035,44.7805803);
function initialize(){ 
var mapProp={center:myCenter,zoom:17,mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel:true};
map=new google.maps.Map(document.getElementById("MAP"),mapProp);
placeMarker(vake1,"Vere Palace",99991);


var styles=[  {
    "stylers": [{ "saturation": -100 }
     /* ,
      {"hue": '#333333'},
      { "weight": 1.5 } */
    ]
  }];
  map.setOptions({styles: styles});
  map.setOptions({styles: styles});
  var infowindow = new google.maps.InfoWindow({
  content:"8 Beliashvili Street"
  });

google.maps.event.addListener(marker, 'mouseover', function() {
  infowindow.open(map,marker);
  });
 google.maps.event.addListener(marker, 'mouseout', function() {
  infowindow.close(map,marker);
  });

  }
  function placeMarker(loc,name,manu){
 marker = new google.maps.Marker({position: loc,map: map,icon:"img/slogo.png"});
 infowindow = new google.maps.InfoWindow({
    content: name
  });
  }	
</script>
</body>
</html>