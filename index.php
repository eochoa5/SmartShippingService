<?php session_start();
if(isset($_SESSION['name']) && isset($_SESSION['pass'])){
	header("location: http://localhost:8080/SmartShippingService/user");
	exit();
	
}
if(isset($_POST["email"]) && isset($_POST["password"])){
	include_once("database/connect.php");
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$password=mysqli_real_escape_string($db_conx,$_POST["password"]);
	$sql = "SELECT * FROM users WHERE email='$email'";
	$query = mysqli_query($db_conx, $sql); 
	 $found= mysqli_num_rows($query);
	 $row=mysqli_fetch_assoc($query);
	
	if($found == 1 && crypt($password, $row["password"]) == $row["password"]){
		    $name= $row["first"] . " " .$row["last"] ;
			$_SESSION['name'] = $name;
			$_SESSION['pass'] = $row["password"];
			setcookie("name", $name, strtotime( '+30 days' ), "/", "", "", TRUE);
		    echo $found;
		    exit();
	}
	else{
		echo 0;
		exit();
		
	}
	
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
		
		
		
		<script>
		function login(){
	var em = document.getElementById("email").value.trim();
	var pass = document.getElementById("pass").value.trim();
	
	if(em !="" && pass !="" ){
		var req = new XMLHttpRequest();
    req.open("POST", "index.php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
	    if(req.readyState == 4 && req.status == 200) {
			if(req.responseText =="0"){
				alert("Wrong email or password!");
					
			}
			else{
				location.assign('user');
			}
			
	    }
    }
	
    req.send("email="+em+"&password="+pass); 
    
	}
}
		</script>
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


<form id="myForm" onsubmit="return false;">
<div class="abc">Login here</div>
 
    <label><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" id="email" required><br>

    <label><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" id="pass" required><br>
        
    <button style="margin-top: 9px" onclick="login()">Login</button><br><br>
	<a href="#">Forgot Password?</a><br>
	<a href="signup.php">Create an Account</a>
	
  
</form>


<?php include_once("page_bottom.php"); ?>
</body>

</html>