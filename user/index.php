<?php session_start(); 
if(!isset($_SESSION['name']) && !isset($_SESSION['pass'])){
	header("location: http://localhost:8080/SmartShippingService");
	exit();
}
?>
<html> 
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Home</title>
		
<style>
		#menuContainer  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    border: 1px solid #555;
}

#menuContainer  li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

#menuContainer  li {
    text-align: center;
    border-bottom: 1px solid #555;
}

#menuContainer  li:last-child {
    border-bottom: none;
}

#menuContainer  li a.active {
    background-color: #02CDA2;
    color: white;
}

#menuContainer  li a:hover:not(.active) {
    background-color: green;
    color: white;
}
</style>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<div id="userMiddle">
<b><span style="margin-left:60px; color:white; margin-top:10px; position:absolute;"><?php echo $_SESSION['name'];?></span></b>
<img src="images/user.png"/ id="userImg">
<div id="menuContainer">
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#">Notifications</a></li>
  <li><a href="#">My shipments</a></li>
  <li><a href="#">Opened Tickets</a></li>
  <li><a href="#">Account Settings</a></li>
  <li><a href="logout.php">Log out</a></li>
</ul>
</div>



</div>
<?php include_once("../page_bottom.php"); ?>
</body>

</html>