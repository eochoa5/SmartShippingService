<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Track Shipment</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="signupForm" name="signupform" onsubmit="return false;">
<div class="abc" style="margin-top:10px">Enter the information below to track your shipment</div>
 <div id="signupFormDiv">
    <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Shipment ID</b></label><br>
    <input id="Shipid" type="text" placeholder="Shipment ID" name="shipid" required maxlength="20" size="40"><br/>      
    <button style="margin-top: 13px" id="signupbtn" onclick="">Track</button><br><br>
</div>
  
</form>

<?php include_once("../page_bottom.php"); ?>
</body>

</html>