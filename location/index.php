<?php 

$processed= false;


if(isset($_POST["zip"])){
	$processed= true;
	$input= $_POST["address"]. ", " . $_POST["country"] . ", " .  $_POST["state"] . ", " . $_POST["zip"];
	
	
	$addressArray = explode("\n", file_get_contents('addressList.txt'));
	
	foreach ($addressArray as $value) {
		
		$to = $value;
		$from = $input;
		$from = urlencode($from);
		$to = urlencode($to);
		$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
		$data = json_decode($data);
		$distance = 0;
		foreach($data->rows[0]->elements as $road) {
			$distance += $road->distance->value;
		}
		$addrDistAssoc[$value] = round(($distance*0.000621371), 2);

}
		asort($addrDistAssoc);
		
}
?>


<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Location Finder</title>
		
		<style>
		.cool{
			background-color:#0f8706;
			padding: 4px 4px 4px 8px;
			border-radius: 50%; 
		}
		
		#map{position:absolute;
		border: 1px solid red;
		height: 300px;
		width:700px;
		height: 700px;
		margin-left: 45%;
		margin-top:-475px;
		
		
			
			
		}
		</style>
		
	<script>
	function pinSymbol(color) {
			return {
			path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z',
			fillColor: color,
			fillOpacity: 1,
			strokeColor: '#000',
			strokeWeight: 1,
			scale: 1,
			labelOrigin: new google.maps.Point(0,-29)
			};
	}
	</script>
		
		
		
	</head>
<body>


<?php include_once("../page_top.php"); ?>

<form id="signupForm" action="" method="post" <?php if ($processed){echo 'style="display:none;"';} ?> >
<div class="abc" style="margin-top:10px">Please enter your address or zip code to find the nearest location</div>
 <div id="signupFormDiv">
    <label><b>Address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address"  maxlength="120" size="40">
	<select name="country" id="country">
      <?php include_once("../country_list.php"); ?>
    </select>
	 <input id="state" type="text" placeholder="State" name="state"  maxlength="6">
	  <input id="zip" type="text" placeholder="Zip code" name="zip" required maxlength="9">
	<br>
        
    <button style="margin-top: 13px" >Find location</button><br><br>
</div>
  
</form>

<div id="locationsContainer" <?php if (!$processed){echo 'style="display:none;"';} ?> style="color:black; height:800px;">
<?php $input= $_POST["address"]. ", " . $_POST["country"] . ", " .  $_POST["state"] . ", " . $_POST["zip"]; ?>
<div class="abc" style="margin-top:10px">Here are our nearest locations to <?php echo $input; ?></div><br>
<?php

$count=1;
foreach($addrDistAssoc as $addr => $dist) {
			echo  "<span class='cool'>" . chr($count+64) . " </span>" . " &nbsp;" . $addr . "<br>&emsp; &emsp;  <span style='color:red'>Distance: " . $dist . " miles away. </span>";
			echo " <br> &emsp; &emsp; <a href=\"https://maps.google.com/maps?saddr=$input&daddr=$addr\" target=\"_blank\"><button style='margin-top:3px;'>Get directions</button></a> <br><br>";
			$count++;
		}

?>
<div id="map"></div>

<?php 

$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($input).'&sensor=false');
		$geo = json_decode($geo, true);

		if ($geo['status'] == 'OK') {
		  $latitude = $geo['results'][0]['geometry']['location']['lat'];
		  $longitude = $geo['results'][0]['geometry']['location']['lng'];  
		  
		}
		
?>
		
<script>


      function initMap() {
        var myLatLng = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
         var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

		var image="images/upin.png";
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
		  icon:image,
          title: 'You are here',
		  
        });
		var bounds = new google.maps.LatLngBounds();
		bounds.extend(marker.position);
		var labels= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		
		//locations markers
		<?php 
		$index=0;
		foreach($addrDistAssoc as $addr => $dist) {
			$geo1 = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($addr).'&sensor=false');
			$geo1 = json_decode($geo1, true);

			if ($geo1['status'] == 'OK') {
			$latitude1 = $geo1['results'][0]['geometry']['location']['lat'];
			$longitude1 = $geo1['results'][0]['geometry']['location']['lng'];  
		  
			}
			
			echo "var marker1 = new google.maps.Marker({";
			echo " position: new google.maps.LatLng(" . $latitude1. "," .  $longitude1 . "), map: map,";
			echo "title:'', label: labels[$index], icon: pinSymbol('#0f8706')});";
			echo "bounds.extend(marker1.position);";
			$index++;
			
		}
		
		?>
		map.fitBounds(bounds);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL9UZgxdhQyz_mj1rB969bH7_BHRT_aA0&callback=initMap">
    </script>
</div>

 
<?php include_once("../page_bottom.php"); ?>
</body>

</html>