<?php
if(isset($_POST["first"])){
	include_once("../database/connect.php");
	
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$date=date('Y-m-d',strtotime($_POST['dt']));
	$time=date(($_POST['tm']));
	$phone=mysqli_real_escape_string($db_conx,$_POST["phone"]);
	$insurance=mysqli_real_escape_string($db_conx,$_POST["insurance"]);
	$address=mysqli_real_escape_string($db_conx,$_POST["address"]);
	$state=mysqli_real_escape_string($db_conx,$_POST["state"]);
	$zip=mysqli_real_escape_string($db_conx,$_POST["zip"]);
	$country=mysqli_real_escape_string($db_conx,$_POST["country"]);
	$address2=mysqli_real_escape_string($db_conx,$_POST["address2"]);
	$state2=mysqli_real_escape_string($db_conx,$_POST["state2"]);
	$zip2=mysqli_real_escape_string($db_conx,$_POST["zip2"]);
	$country2=mysqli_real_escape_string($db_conx,$_POST["country2"]);
	
	$sql = "INSERT INTO `pickups`(`id`, `first`, `last`, `type`, `email`,`date`, `phone`, `time`, `insurance`, `pickedUp`, `originAddress`, `destAddress`) 
	VALUES ('', '$first','$last', 'Normal', '$email','$date', '$phone','$time','$insurance','No','$address, $country, $state, $zip', '$address2, $country2, $state2, $zip2')";
	$query = mysqli_query($db_conx, $sql); 
	
	$sql2="SELECT * FROM `pickups` WHERE `first`='$first' AND `originAddress`='$address, $country, $state, $zip'";
	$query2=mysqli_query($db_conx, $sql2);
	$found= mysqli_num_rows($query2);
	if($found){
		echo "<script>alert('A pickup has been created.');</script>";
	}
	else{
		echo "<script>alert('Error while creating pickup, please try again.');</script>";	
	} 
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
    <label><b>Your Address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address" required maxlength="120" size="40">
	<select name="country" id="country">
      <?php include("../country_list.php"); ?>
    </select>
	<input id="state" type="text" placeholder="State" name="state" required maxlength="4">
	  <input id="zip" type="text" placeholder="Zip code" name="zip" required maxlength="9"><br>
	<label><b>Destination Address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address2" required maxlength="120" size="40">
	<select name="country2" id="country">
      <?php include("../country_list.php"); ?>
    </select>
	 <input id="state" type="text" placeholder="State" name="state2" required maxlength="4">
	  <input id="zip" type="text" placeholder="Zip code" name="zip2" required maxlength="9"><br>
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
