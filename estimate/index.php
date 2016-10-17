<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Estimate</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="signupForm" name="signupform" onsubmit="return false;">
<div class="abc" style="margin-top:10px">Please fill out the information below to get your estimate</div>
 <div id="signupFormDiv">
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
        
    <button style="margin-top: 13px" id="signupbtn" onclick="">Get Estimate</button><br><br>
</div>
  
</form>





<?php include_once("../page_bottom.php"); ?>
</body>

</html>