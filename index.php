<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css">
		<link href="stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="js/ddmenu.js" type="text/javascript"></script>
		<title> Smart Shipping Services</title>
	</head>
<body>
<?php include_once("page_top.php"); ?>

<form action="login.php" id="myForm">
<div class="abc">Login here</div>
 
    <label><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="uname" required><br>

    <label><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
        
    <button type="submit" style="margin-top: 9px">Login</button><br><br>
	<a href="#">Forgot Password?</a><br>
	<a href="signup.php">Create an Account</a>
	
  
</form>


<?php include_once("page_bottom.php"); ?>
</body>

</html>