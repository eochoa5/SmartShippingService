<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Location Finder</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="signupForm" name="signupform" onsubmit="return false;">
<div class="abc" style="margin-top:10px">Please enter your address or zip code to find the nearest location</div>
 <div id="signupFormDiv">
    <label><b>Address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address" required maxlength="120" size="40">
	<select name="country" id="country">
      <?php include_once("../country_list.php"); ?>
    </select>
	 <input id="state" type="text" placeholder="State" name="state" required maxlength="4">
	  <input id="zip" type="text" placeholder="Zip code" name="zip" required maxlength="9">
	<br>
        
    <button style="margin-top: 13px" id="signupbtn" onclick="">Find location</button><br><br>
</div>
  
</form>





<?php include_once("../page_bottom.php"); ?>
</body>

</html>