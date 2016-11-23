<?php
$registration = false;

if(isset($_POST["first"])){
	include_once("../database/connect.php");
	include_once("../database/hash.php");
	
	$plan=(is_numeric($_POST['plan']) ? (int)$_POST['plan'] : 0);
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$companyName=mysqli_real_escape_string($db_conx,$_POST["companyname"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$address=mysqli_real_escape_string($db_conx,$_POST["address"]);
	$password=mysqli_real_escape_string($db_conx,$_POST["pass"]);
	//$phone=mysqli_real_escape_string($db_conx,$_POST["phone"]);
	$password= cryptPass($password);
	
	$sql = "INSERT INTO retailers (plan, id, first, last, email, companyName, password, address)       
		        VALUES($plan, '','$first','$last','$email', '$companyName' , '$password','$address')";
	$query = mysqli_query($db_conx, $sql); 
	
	$registration = true;
	
}
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Retailer plan</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>

<div>
	<?php
		if($registration){
			echo "Registration Confirmed. You will be redirected to the homepage in 5 seconds.";
			echo "<script>window.setTimeout(function(){window.location.href = 'http://localhost:8080/SmartShippingService/';},5000);</script>";
		}
	?>
</div>

<div class="abc" style="margin-top:10px; font-size:18px;">
Retailers may opt-in to one of our plans to receive discounted shipping rates as well as seasonal promotions.<br>
 Fill out the short form below so that we can apply discounted shipping on all of your future shipments.
</div>
<form id="retailersignupForm" name="retailersignupForm" method="post" action="retailers.php">

<div id="signupFormDiv">
 
 
  <label><b>Plan Length</b></label><br>
 <select name="plan" id="plan" form="retailersignupForm">
  <option value="1">1 Year Plan (5% Savings)</option>
  <option value="2">2 Year Plan (10% Savings)</option>
  <option value="5">5 Year Plan (20% Savings)</option>
</select><br>
 
    <label><b>First Name</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last Name</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Company Name</b></label><br>
    <input id="companyname" type="text" placeholder="Company Name" name="companyname" required maxlength="30"><br>
	<label><b>Email Address</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Business Address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address" required maxlength="120" size="40">
	<select name="country" id="country">
      <?php include_once("../country_list.php"); ?>
    </select>
	 <input id="state" type="text" placeholder="State" name="state" required maxlength="4">
	  <input id="zip" type="text" placeholder="Zip code" name="zip" required maxlength="9">
	<br>
	<label><b>Password</b></label><br>
    <input id="pass" type="text" placeholder="Password" name="pass" required maxlength="20"><br>
	<label><b>Phone Number</b></label><br>
    <input id="phone" type="text" placeholder="Phone Number" name="phone" required maxlength="15"><br>
        
    <input type="submit" style="margin-top: 13px">
</div>
  
</form>





<?
php /*
//give description of the plans we offer to partner up with retailers, prices, getting all their shipments
picked up by a person. Drone can't be used since they will be shipping a lot of stuff
//take first, last, company name, email, phone, address, 
partner up plan choice ie. 1 year plan and price, 2 year plan, etc. (use select input type as used in other pages ie. country select),
sign up button 

*/ ;
?>

<?php
include_once("../page_bottom.php");
?>
</body>

</html>