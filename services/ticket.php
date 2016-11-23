<?php
if(isset($_POST["first"])){
	include_once("../database/connect.php");
	
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$id =mysqli_real_escape_string($db_conx,$_POST["shipid"]);
	$desc=mysqli_real_escape_string($db_conx,$_POST["desc"]);
	
	$sql = "INSERT INTO `tickets`(`id`, `first`, `last`, `email`, `shipmentID`, `description`, `date`,`status`) 
	VALUES ('', '$first', '$last','$email', $id, '$desc',CURRENT_TIMESTAMP,'open')";
	$query = mysqli_query($db_conx, $sql); 
	
}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Open a ticket</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="ticketForm" name="ticketForm" method="post" action="ticket.php">
<div class="abc" style="margin-top:10px">Please fill out the information below</div>
 <div id="signupFormDiv">
    <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Shipment ID</b></label><br>
    <input id="Shipid" type="text" placeholder="Shipment ID" name="shipid" required maxlength="20" size="40"><br/>
	<label><b>Describe the issue</b></label><br>
    <textarea rows="6" cols="70" required placeholder="Description" name="desc" id="desc" style="resize:none" maxlength="500"></textarea><br>
        
    <button style="margin-top: 13px" id="signupbtn" onclick="">Submit</button><br><br>
</div>
  
</form>
<?php include_once("../page_bottom.php"); ?>
</body>

</html>
