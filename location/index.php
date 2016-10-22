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
		$addrDistAssoc[$value] = $distance*0.000621371;

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
	</head>
<body>

<script>

</script>
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

<div id="locationsContainer" <?php if (!$processed){echo 'style="display:none;"';} ?> style="color:white; height:700px;">
<?php $input= $_POST["address"]. ", " . $_POST["country"] . ", " .  $_POST["state"] . ", " . $_POST["zip"]; ?>
<div class="abc" style="margin-top:10px">Here are our nearest locations to <?php echo $input; ?></div><br>
<?php

$count=1;
foreach($addrDistAssoc as $addr => $dist) {
			echo  $count . ") " . $addr . "<br> &emsp;  <span style='color:red'>Distance: " . $dist . " miles away. </span>";
			echo " <br> &emsp; <a href=\"https://maps.google.com/maps?saddr=$input&daddr=$addr\" target=\"_blank\"><button>Get directions</button></a> <br><br>";
			$count++;
		}

?>

</div>
<?php include_once("../page_bottom.php"); ?>
</body>

</html>