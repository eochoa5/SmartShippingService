<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Alerts</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="signupForm" name="signupform" onsubmit="return false;">
<div class="abc" style="margin-top:10px">Please fill out the information below to set up your alert preferences.</div>
 <div id="signupFormDiv">
    <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Phone Number</b></label><br>
    <input id="phone" type="text" placeholder="Phone Number" name="phone" required maxlength="15"><br>
	<label><b>Shipment ID</b></label><br>
    <input id="Shipid" type="text" placeholder="Shipment ID" name="shipid" required maxlength="20" size="40"><br/>
	<label><b>Text or email</b></label><br>
     <input type="radio" name="type1" value="text"> text
  <input type="radio" name="type1" value="email"> email<br>
  <label><b>Major checkpoints or only at arrival to destination</b></label><br>
     <input type="radio" name="type2" value="Major Checkpoints"> Major Checkpoints
  <input type="radio" name="type2" value="Arrival"> Arrival<br>
        
    <button style="margin-top: 13px" id="signupbtn" onclick="">Set up alerts</button><br><br>
</div>
  
</form>




<?php include_once("../page_bottom.php"); ?>
</body>

</html>