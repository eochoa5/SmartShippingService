<?php
if(isset($_POST["first"])){
	include_once("../database/connect.php");
	
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$id =mysqli_real_escape_string($db_conx,$_POST["shipmentId"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$date=date('Y-m-d',strtotime($_POST['dt']));
	$time=date(($_POST['tm']));
	$phone=mysqli_real_escape_string($db_conx,$_POST["phone"]);
	$insurance=mysqli_real_escape_string($db_conx,$_POST["insurance"]);
	$address=mysqli_real_escape_string($db_conx,$_POST["address"]);
	
	$sql = "INSERT INTO `pickups`(`id`, `shipmentId`, `first`, `last`, `type`, `email`,`date`, `phone`, `time`, `insurance`, `pickedUp`, `locationAddress`) 
	VALUES ('', '$id', '$first','$last', 'Normal', '$email','$date', '$phone','$time','$insurance','No','$address')";
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
<form id="pickUpForm" name="normalPickupForm" method="post" action="index.php">
<div class="abc" style="margin-top:10px">Please fill out the information below</div>
 <div id="signupFormDiv">
	<label><b>Shipment ID you wish to pick up</b></label><br>
    <input id="shipmentId" type="text" placeholder="Shipment ID" name="shipmentId" required maxlength="15"><br>
    
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
    <label><b>Choose a location to pickup from</b></label><br>
    <select id="address" name="address">
  <option value="7 day ground economy shipping">5154 State University Dr, Los Angeles, CA 90032</option>
  <option value="Next day air expedited shipping">University of California, Los Angeles, Los Angeles, CA 90095</option>
  <option value="2 day air expedited shipping">Gold's Gym, 735 S Figueroa St #100, Los Angeles, CA 90017</option>
  <option value="4 day ground shipping">1 World Way, Los Angeles, CA 90045</option>
  <option value="International air economy shipping">University of Southern California, Los Angeles, CA 90007</option>
  <option value="International air expedited 2 day shipping">LA Fitness, 1833 South La Cienega Boulevard, Los Angeles, CA 90035</option>
</select><br>
	<label><b>Insurance</b></label><br>
	<select name="insurance" id="insurance">
	<option value="yes">Yes</option>
	<option value="no">No</option>
	</select><br>
    
        
    <button style="margin-top: 13px" id="signupbtn" onclick="">Schedule pick up</button><br>
</div>
  
</form>





<?php include_once("../page_bottom.php"); ?>
</body>

</html>
