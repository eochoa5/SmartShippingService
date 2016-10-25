<?php
if(isset($_POST["first"])){
	include_once("../database/connect.php");
	
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$type=mysqli_real_escape_string("normal");
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$phone=mysqli_real_escape_string($db_conx,$_POST["phone"]);
	$time=mysqli_real_escape_string($db_conx,$_POST["address"]);
	$deliveryType=mysqli_real_escape_string($db_conx,$_POST["deliveryType"]);
	$weight=mysqli_real_escape_string($db_conx,$_POST["weight"]);
	$insurance=mysqli_real_escape_string($db_conx,$_POST["insurance"]);
	$pickedUp=mysqli_real_escape_string("No");
	$address=mysqli_real_escape_string($db_conx,$_POST["insurance"]);
	$destAddress=mysqli_real_escape_string($db_conx,$_POST["address2"]);
	
	$sql = "INSERT INTO pickups (id, pickupID, first, last, type, email, phone, time, deliveryType, weight, insurance, pickedUp, address, destAddress)       
		        VALUES('', '','$first','$last','$type', '$email' , '$phone','$time', '$deliveryType', '$weight', '$insurance', '$pickedUp', '$address', '$destAddress')";
	
	$query = mysqli_query($db_conx, $sql);
}

?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Schedule up a pick up</title>
	</head>
<body>



<?php include_once("../page_top.php"); ?>
<form id="signupForm" name="signupform" onsubmit="return false;">
<div class="abc" style="margin-top:10px">Please fill out the information below</div>
 <div id="signupFormDiv">
 <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Date</b></label><br>
	<input type="date" name="dt"><br/>
	<label><b>Time</b></label><br>
	<input type="time" name="tm"><br/>
	<label><b>Phone Number</b></label><br>
    <input id="phone" type="text" placeholder="Phone Number" name="phone" required maxlength="15"><br>
    <label><b>Choose delivery option</b></label><br>
    <select>
  <option value="7 day ground economy shipping">7 day ground economy shipping</option>
  <option value="Next day air expedited shipping">Next day air expedited shipping</option>
  <option value="2 day air expedited shipping">2 day air expedited shipping</option>
  <option value="4 day ground shipping">4 day ground shipping</option>
  <option value="International air economy shipping">International air economy shipping</option>
  <option value="International air expedited 2 day shipping">International air expedited 2 day shipping</option>
  <option value="International air 4 day shipping">International air 4 day shipping</option>
</select><br>
    <label><b>Your Address/store address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address" required maxlength="120" size="40">
	<select name="country" id="country">
      <?php include_once("../country_list.php"); ?>
    </select>
	 <input id="state" type="text" placeholder="State" name="state" required maxlength="4">
	  <input id="zip" type="text" placeholder="Zip code" name="zip" required maxlength="9">
	<br>
	<label><b>Destination Address</b></label><br>
    <input id="address2" type="text" placeholder="Street Address" name="address" required maxlength="120" size="40">
	<select name="country" id="country2">
      <?php include("../country_list.php"); ?>
    </select>
	 <input id="state2" type="text" placeholder="State" name="state" required maxlength="4">
	  <input id="zip2" type="text" placeholder="Zip code" name="zip" required maxlength="9">
	<br>
	<label><b>Shipment weight </b></label><br>
    <input id="weight" type="text" placeholder="Weight" name="weight" required maxlength="20"><br>
	<label><b>Insurance</b></label><br>
     <input type="radio" name="insurance" value="yes"> Yes
  <input type="radio" name="insurance" value="no"> No<br>
        
    <button style="margin-top: 13px" id="signupbtn" onclick="">Schedule pick up</button><br><br>
</div>
  
</form>





<?php include_once("../page_bottom.php"); ?>
</body>

</html>
