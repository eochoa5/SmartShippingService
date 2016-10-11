<?php
if(isset($_POST["firstname"])){
	include_once("database/connect.php");
	
	$first=mysqli_real_escape_string($db_conx,$_POST["firstname"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["lastname"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$address=mysqli_real_escape_string($db_conx,$_POST["address"]);
	$password=mysqli_real_escape_string($db_conx,$_POST["password"]);
	$phone=mysqli_real_escape_string($db_conx,$_POST["phone"]);
	
	$sql = "INSERT INTO users (id, first, last, email, password, address, phone, sign_up_date)       
		        VALUES('','$first','$last','$email','$password','$address','$phone',now())";
	$query = mysqli_query($db_conx, $sql); 
	
	echo $query;
	exit();
}
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css">
		<link href="stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="js/ddmenu.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<title> Sign up</title>
	</head>
<body>
<?php include_once("page_top.php"); ?>
<form id="signupForm" name="signupform" onsubmit="return false;">
<div class="abc" style="margin-top:10px">Please fill out the information below to create your account</div>
 <div id="signupFormDiv">
    <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>Address</b></label><br>
    <input id="address" type="text" placeholder="Street Address" name="address" required maxlength="120" size="40">
	<select name="country" id="country">
      <?php include_once("country_list.php"); ?>
    </select>
	 <input id="state" type="text" placeholder="State" name="state" required maxlength="4">
	  <input id="zip" type="text" placeholder="Zip code" name="zip" required maxlength="9">
	<br>
	<label><b>Password</b></label><br>
    <input id="pass" type="text" placeholder="Password" name="pwd" required maxlength="20"><br>
	<label><b>Phone Number</b></label><br>
    <input id="phone" type="text" placeholder="Phone Number" name="phone" required maxlength="15"><br>
        
    <button style="margin-top: 13px" id="signupbtn" onclick="signup()">Create Account</button><br><br>
</div>
  
</form>

<?php include_once("page_bottom.php"); ?>
</body>

</html>