<?php session_start();
if(isset($_POST["shipid"])){
	include_once("../database/connect.php");
	$shipid=mysqli_real_escape_string($db_conx,$_POST["shipid"]);
	$sql = "SELECT * FROM shipments WHERE shipmentID='$shipid'";
	$query = mysqli_query($db_conx, $sql); 
	 $found= mysqli_num_rows($query);
	 
	 if($found ==1){
		 $row=mysqli_fetch_assoc($query);
		 $_SESSION['address'] = $row["address"];
		 $_SESSION['dest']= $row["destAddress"];
		 $_SESSION['shipid']= $shipid;
		
	 
	 }
	 else{
		 if(isset($_SESSION['address'])){
			 $_SESSION = array();
			 session_destroy();
			 
		 }	 
		 
	 } 
}

if(isset($_POST["loc"])) {
	
	include("../database/connect.php");
	$shipID= $_SESSION['shipid'];
	$sql = "SELECT * FROM shipments WHERE shipmentID='$shipID'";
	$query = mysqli_query($db_conx, $sql);
	$row=mysqli_fetch_assoc($query);
	
	$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($row["curLoc"]).'&sensor=false');
		$geo = json_decode($geo, true);

		if ($geo['status'] == 'OK') {
		  $latitude = $geo['results'][0]['geometry']['location']['lat'];
		  $longitude = $geo['results'][0]['geometry']['location']['lng'];  
		  
		}
		
	
	 echo $latitude . ' ' . $longitude;
	 exit();
	
}


if(!isset($_SESSION['address']) && !isset($_SESSION['dest'])){
	header("location: http://localhost:8080/SmartShippingService/Services/realTimeTracking.php");
	exit();
	
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
	 
    </style>
	
	<script>
	function placeMarker(myMarker){ 
		var x="";
		var req = new XMLHttpRequest();
		req.open("POST", "", true);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				var result = req.responseText.split(" ");
				var lat= parseFloat(result[0]);
				var lon= parseFloat(result[1]);
				var latlng = new google.maps.LatLng(lat, lon);
				myMarker.setPosition(latlng);
				setTimeout(placeMarker(myMarker), 20000);
			}
		}
	
		req.send("loc="+x); 					
	}
	</script>
  </head>
  <body>
    <div id="floating-panel">
    <b>Shipped from: </b>
    <select id="start">
      <option value="<?php echo  $_SESSION['address'];  ?>"> <?php echo  $_SESSION['address'];  ?></option>
    </select>
    <b>Destination: </b>
    <select id="end">
      <option value="<?php echo  $_SESSION['dest'];  ?>"><?php echo  $_SESSION['dest'];  ?></option>
    </select>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
		
			var image ="images/box.png";
			var myLatLng= {lat: 41.85, lng: -87.65};
			var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Your Package is here!',
			icon: image
			});
			marker.setOptions({'opacity': 0.7});
			
		placeMarker(marker); 
        directionsDisplay.setMap(map);
		
		 
	
        var onLoadHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
       this.addEventListener('load', onLoadHandler);
      }
		
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
	  
	  
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL9UZgxdhQyz_mj1rB969bH7_BHRT_aA0&callback=initMap">
    </script>
  </body>
</html>













