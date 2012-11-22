<html>
<head>
	<?php
		$title = "Karte";
		include("header.php");
	?>
	<title>Karte</title>
	<style type="text/css">
		html { height: 100% }
		body { height: 100%; margin: 0; padding: 0 }
		#map_canvas { height: 100% }
	</style>
	
	<script type="text/javascript"!
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAVHx_d1I9yUwYKlgVJle0su9PiwVODEk&sensor=false">
	</script>
	
	<script type="text/javascript">
		var last_marker = new google.maps.Marker({
					position: null,
					map: null,
					icon: null,
					draggable: true
				});;
	
		function initialize() {
			var mapOptions = {
				center: new google.maps.LatLng(47.66, 9.16),
				zoom: 14,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
			
			google.maps.event.addListener(map, 'center_changed', function() {
				var lat = map.getCenter().lat();
				var lng = map.getCenter().lng();
				var lat_h = Math.floor(lat);
				if(Math.abs(lat_h) < 10){
					if(lat_h < 0){
						lat_h = "-0" + Math.abs(lat_h);
					}else{
						lat_h = "0" + lat_h;
					}
				}
				
				var lat_m = Math.floor((lat - lat_h) * 10000)/100;
				if(lat_m < 10){
					lat_m = "0" + lat_m;
				}
				var lng_h = Math.floor(lng);
				if(Math.abs(lng_h) < 10){
					if(lng_h < 0){
						lng_h = "-00" + Math.abs(lng_h);
					}else{
						lng_h = "00" + lng_h;
					}
				}else if(Math.abs(lng_h) < 100){
					if(lng_h < 0){
						lng_h = "-0" + Math.abs(lng_h);
					}else{
						lng_h = "0" + lng_h;
					}
				}
				
				var lng_m = Math.floor((lng - lng_h) * 10000)/100;
				if(lng_m < 10){
					lng_m = "0" + lng_m;
				}
				document.getElementById("lat").firstChild.nodeValue=lat_h + "°" + lat_m + "'N";
				document.getElementById("long").firstChild.nodeValue=lng_h + "°" + lng_m + "'E";
			})
			
			google.maps.event.addListener(map, 'click', function(event) {
				var image = new google.maps.MarkerImage(
					"crosshair25px.png", new google.maps.Size(71, 71),
					new google.maps.Point(0, 0), new google.maps.Point(12.5, 12.5),
					new google.maps.Size(25, 25));
				last_marker.setPosition(event.latLng);
				last_marker.setMap(map);
				});
			})
			
			google.maps.event.addListener(last_marker, 'click', function(event) {
				last_marker.setMap(null);
			})
		}
	</script>	
</head>
<body onload="initialize()">
	<?php
		$karte = "class='current_page_item'";
		include("menu.php");
	?>
	
	<h1>Lat <span id="lat">47°66.00'N</span> Long <span id="long">009°16.00'E </span></h1>
	<div id="map_canvas" style="width:100%;height:100%"></div>
	
	<!--footer-->
	<?php
		include("footer.php");
	?>
</body>
</html>