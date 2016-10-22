<?php session_start();
if(isset($_SESSION['name']) && isset($_SESSION['pass'])){
	header("location: http://localhost:8080/SmartShippingService/user");
	exit();
	
}

?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css">
		<link href="stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		 <link href="stylesheets/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    
		<script src="js/ddmenu.js" type="text/javascript"></script>
		<title> Smart Shipping Service</title>
		
	</head>
<body>
<?php include_once("page_top.php"); ?>
<br/>
 <div id="sliderFrame">
        <div id="slider">
          
            <img src="images/img0.png" alt="" />
			<img src="images/img5.png" alt="Try our new live tracking tool" />
            <img src="images/img3.png" alt="We offer drone pick ups"/>
            <img src="images/img4.png" alt="Ground and air delivery" />
            
           
        </div>
       
    </div>

<?php include_once("page_bottom.php"); ?>
</body>

</html>