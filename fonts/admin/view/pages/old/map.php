<div class="container-fluid">
	<div class="row">
		<div class="col-sm-7 p-3" id="map" style="height:400px;">
			
		</div>
		<div class="col-sm-5">

			<div class="row">
      <div class="col-sm-10 my-3">
    <div class='row'>
	<div class='col-sm-4'>
	
	    <button class='btn btn-success ltab w-100' d='1' > ქართული</button>
	  
	</div>
	<div class='col-sm-4' >

	    <button class='btn btn-danger ltab w-100' d='2' >  ინგლისური</button>
	  
	</div>
	<div class='col-sm-4' >
	
	    <button class='btn btn-danger  ltab w-100' d='3'>  რუსული</button>
	  
	</div>
	</div>
  </div>
				<div class="col-sm-12 mt-3">
         	<input type='text' class='form-control title enebi' d='1' placeholder='სათაური ge'>


			<input type='text' class='form-control titleen enebi' d='2' style='display:none' placeholder='ტექსტი en'>
	

			<input type='text' class='form-control titleru enebi' d='3' style='display:none' placeholder='ტექსტი ru'> 
				</div>
				<div class="col-sm-12 mt-3">
         	<input type='text' class='form-control text enebi' d='1' placeholder='ტექსტი ge'>


			<input type='text' class='form-control texten enebi' d='2' style='display:none' placeholder='ტექსტი en'>
	

			<input type='text' class='form-control textru enebi' d='3' style='display:none' placeholder='ტექსტი ru'> 
				</div>
				<div class="col-sm-12 mt-3">
					<div class="row">
					<div class="col-sm-9">
					   <input  value='<?=$rtm["image"]?>' placeholder="PIN Icon" n='image' d='<?=$rtm['id'] ?>' t='map' id="YDA" class='form-control PIN'/> 
					 
					</div>   
					<div class="col-sm-3">
				  <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA&amp;relative_url=0')">
					 <button class="btn btn-outline-success">Select</button>
				  </a>
				  </div>
					</div>
				</div>
				<div class="col-sm-12 mt-3">
					<input class="form-control LINK" placeholder="ლინკი"/>
				</div>
				<div class="col-sm-12 mt-3">
					<a class="btn btn-outline-success ADDMAP">დამატება</a>
				</div>
			</div>
		</div>
	</div>
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-4">
				<h3>map</h3>
			</div>
		
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
		<th>id</th>
		<th>Pin Icon</th>
		<th class='enebi' d='1'>Title </th>
		<th class='enebi' d='2' style='display:none'>Title eng</th>
		<th class='enebi' d='3' style='display:none'>Title ru</th>
		<th class='enebi' d='1'>Text ge</th>
		<th class='enebi' d='2' style='display:none'>text en</th>
		<th class='enebi' d='3' style='display:none'>text ru</th>
		

		
		<th>წაშლა</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$tm=mysqli_query($con,"SELECT t1.*, 
		                      (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='map' AND table_column='name' ) AS nameen,
							  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='map' AND table_column='name' ) AS nameru,
							  (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='map' AND table_column='lastname' ) AS lastnamen,
							  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='map' AND table_column='lastname' ) AS lastnamru,
							  (SELECT column_value FROM langs WHERE short_name='en' AND table_id=t1.id AND table_name='map' AND table_column='text' ) AS texten,
							  (SELECT column_value FROM langs WHERE short_name='ru' AND table_id=t1.id AND table_name='map' AND table_column='text' ) AS textru
							  FROM map AS t1  ORDER BY t1.id DESC");
		$i=0;
		while($rtm=mysqli_fetch_assoc($tm))
		{
		$i++;
		?>
		<tr>
		<th><?=$rtm['id'] ?></th>
		<th class='chimg'>
   		      
				 
			
				<div>
				   <input type='hidden' value='<?=$rtm["img"]?>' n='img' d='<?=$rtm['id'] ?>' t='map' id="YDA<?=$i ?>" class='YDA1'/> 
			       <img src="<?=$rtm["img"]?>" style="width:70px; border:2px" />
				</div>   
				<br/>
				<div>
		      <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA<?=$i?>&amp;relative_url=0')">
		         <button class="btn iframe-btn btn-outline-success">Select</button>
			  </a>
			  </div>
			
		</th>
		<th class='enebi' d='1'><input type='text' value='<?=$rtm['title'] ?>' class="form-control UPTBL"  n='title' d='<?=$rtm['id'] ?>' t='map' /></th>
		<th class='enebi' d='2' style='display:none'><input type='text' value='<?=$rtm['titleen'] ?>' class="form-control UPTBL"  n='title'  ln='en' d='<?=$rtm['id'] ?>'  t='map' /></th>
		<th class='enebi' d='3' style='display:none'><input type='text' value='<?=$rtm['titleru'] ?>' class="form-control UPTBL"  n='title'  ln='ru' d='<?=$rtm['id'] ?>' t='map' /></th>
		<th class='enebi' d='1'><textarea class="form-control UPTBL"  n='text' d='<?=$rtm['id'] ?>' t='map'   ><?=$rtm['text'] ?></textarea></th>
		<th class='enebi' d='2' style='display:none'><textarea ln='en' n='text' d='<?=$rtm['id'] ?>' t='map' class="form-control UPTBL" ><?=$rtm['texten'] ?></textarea></th>
		<th class='enebi' d='3' style='display:none'><textarea ln='ru' n='text' d='<?=$rtm['id'] ?>' t='map' class="form-control UPTBL" ><?=$rtm['textru'] ?></textarea></th>
		<th><a class='DGA btn btn-danger text-light' d='<?=$rtm["id"] ?>' n='map'>წაშლა</a></th>
		</tr>
		<?php
		}
		?>
		</tbody>
	 </table>
	 </div>
 </div>
</div>
<script>
var map;
var markers = [];

function initMap() {
  var haightAshbury = { lat: 41.738678, lng: 44.780519 };

  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: haightAshbury,
    mapTypeId: "terrain"
  });

  // This event listener will call addMarker() when the map is clicked.
  map.addListener("click", function(event) {
    addMarker(event.latLng);
  });

  // Adds a marker at the center of the map.
  addMarker(haightAshbury);
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
	deleteMarkers();
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);

}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjpdLIjhywzr2QZBamJXeijRkE1Zy3is&callback=initMap"></script>