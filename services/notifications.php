<?php
if (isset($_POST["shipid"])){
	include_once("../database/connect.php");
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$shipid= mysqli_real_escape_string($db_conx,$_POST["shipid"]);
	
	$sql1 = "SELECT * FROM shipments WHERE shipmentID='$shipid'";
	$query1 = mysqli_query($db_conx, $sql1);
	$found= mysqli_num_rows($query1);	
	
	if($found){
		$sql = "INSERT INTO notifications (id, first, last, email, shipmentID, notified) VALUES 
		('', '$first', '$last', '$email', '$shipid', 'NO')";
		$query = mysqli_query($db_conx, $sql); 	
		echo "<script>alert('You will receive an email when your shipment arrives at destination.');</script>";
	}
	else{
		echo "<script>alert('That shipment ID does not exist!');</script>";
		
	}
}

?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Notifications</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="signupForm" method="post" action="">
<div class="abc" style="margin-top:10px">Please fill out the information below to set up your notification.</div>
 <div id="signupFormDiv">
    <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Shipment ID</b></label><br>
    <input id="Shipid" type="text" placeholder="Shipment ID" name="shipid" required maxlength="20" size="40"><br/>
        
    <button style="margin-top: 13px" >Set up notification</button><br><br>
</div>
  
</form>




<?php include_once("../page_bottom.php"); ?>
</body>

</html>