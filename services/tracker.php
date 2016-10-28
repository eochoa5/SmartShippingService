<?php session_start();
if(isset($_POST["shipid"])){
	include_once("../database/connect.php");
	$shipid=mysqli_real_escape_string($db_conx,$_POST["shipid"]);
	$sql = "SELECT * FROM shipments WHERE shipmentID='$shipid'";
	$query = mysqli_query($db_conx, $sql); 
	 $found= mysqli_num_rows($query);
	 
	 if($found ==1){
		 $row=mysqli_fetch_assoc($query);
		 $_SESSION['address1'] = $row["address"];
		 $_SESSION['dest1']= $row["destAddress"];
		 $_SESSION['name']= $row["first"] . " " . $row["last"] ;
		 $_SESSION['curloc']= $row["curLoc"];
		 $_SESSION['type']= $row["deliveryType"];
		 $_SESSION['delay']= $row["delay"];
		 $_SESSION['summary']= $row["summary"];
		 $_SESSION['shipDate']= $row["shipDate"];
		 
		 $total_time= $row["delay"];
		 
		 if($row["deliveryType"] =="7 day ground economy shipping" || $row["deliveryType"] =="International air economy shipping"){
			 $total_time+=7;
			 
		 }
		 elseif($row["deliveryType"] =="International air 4 day shipping" || $row["deliveryType"] =="4 day ground shipping" ){
			 $total_time+=4;
			 
		 }
		  elseif($row["deliveryType"] =="International air expedited 2 day shipping" || $row["deliveryType"] =="2 day air expedited shipping" ){
			 $total_time+=2;
			 
		 }
		 else{
			 $total_time+=1;
			 
		 }
		 $_SESSION['total_time']=  $total_time;
		 
		 date_default_timezone_set("America/Los_Angeles");
		$OldDate = strtotime($row["shipDate"]);
		$NewDate = date('M j, Y', $OldDate);
		$diff = date_diff(date_create($NewDate),date_create(date("M j, Y")));
		$_SESSION['percentage']=  ($diff->format('%R%a')/$total_time)*100;
		$_SESSION['remaining']= (($total_time-$diff->format('%R%a')) <1) ? 0 : $total_time-$diff->format('%R%a');
		
		if($_SESSION['percentage']==100 || $_SESSION['remaining']==0){
			$sql = "UPDATE shipments SET delivered='YES' WHERE shipmentID='$shipid'";
			$query = mysqli_query($db_conx, $sql);
		
		}
		 
	 }
	 else{
		 if(isset($_SESSION['address1'])){
			 $_SESSION = array();
			 session_destroy();
			 
		 }	 
		 
	 } 
}

if(!isset($_SESSION['address1']) && !isset($_SESSION['summary'])){
	header("location: http://localhost:8080/SmartShippingService/Services/trackShipment.php");
	exit();
	
}


?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Track Shipment</title>
		
<style>	

table, th, td {color:white;
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
#progBar{margin-top:150px;
	margin-left:34%;
	position:absolute;
		border: solid 2px black;
		width: 59%;
		height: 60px;
		border-top-left-radius: 30px;
		border-bottom-left-radius: 30px;
		border-top-right-radius: 30px;
		border-bottom-right-radius: 30px;
		
		}
		
		#bar-fill{
		width: <?php 
		if ($_SESSION['percentage'] < 1){echo 0;}
		elseif($_SESSION['percentage'] > 100){ echo 100;}
		else{echo $_SESSION['percentage'];}
		
		?>%;
		border-top-left-radius: 28px;
		border-bottom-left-radius: 28px;
		border-top-right-radius: 28px;
		border-bottom-right-radius: 28px;
		height: 100%;
		background:green;
		
		}
		
		#status{margin-left:50%;
			position:absolute;
			font-weight:bold;
			color:white;
			margin-top: 80px;
			font-size:20px;
		}

		#shipDT{position:absolute;
		margin-left:33%;
		margin-top:230px;
		color:white;
			
		}
		#arrivalDT{position:absolute;
		margin-left:80%;
		margin-top:230px;
		color:white;
			
		}
		
		
</style>		
		
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<div id="progBar"><div id="bar-fill"></div></div>
<div id="status">
<?php 
if($_SESSION['percentage']==100 || $_SESSION['remaining']==0){
	echo "Your shipment has arrived!";
		
}
elseif($_SESSION['remaining'] > $_SESSION['total_time']){
	echo "Your package will ship in " . ($_SESSION['remaining']- $_SESSION['total_time']) . " days!";
	
}
else{
	echo "Your shipment will arrive in " . $_SESSION['remaining'] . " days!";
	
}

?>

</div>
<div id="shipDT"><b>Ship date:</b> <?php echo $_SESSION['shipDate'] ?></div>
<div id="arrivalDT"><b>Arrival date:</b> <?php echo date('Y-m-d', strtotime($_SESSION['shipDate']. ' +'. $_SESSION['total_time'] . 'days')); ?></div>

<br>
<table style="width:30%;">
  <caption style="padding-bottom:15px"><b>Shipment Summary</b></caption>
  <tr>
    <th>Name</th>
    <td><?php echo $_SESSION['name'] ?></td>
  </tr>
  <tr>
    <th>Shipment Type</th>
    <td><?php echo $_SESSION['type'] ?></td>
  </tr>
  <tr>
    <th>Ship Date</th>
    <td><?php echo $_SESSION['shipDate'] ?></td>
  </tr>
  <tr>
    <th>From</th>
    <td><?php echo $_SESSION['address1'] ?></td>
  </tr>
  <tr>
    <th>To</th>
    <td><?php echo $_SESSION['dest1'] ?></td>
  </tr>
  <tr>
    <th>Current Location</th>
    <td><?php echo $_SESSION['curloc'] ?></td>
  </tr>
  <tr>
    <th>Delay</th>
    <td><?php echo $_SESSION['delay']. " days"; ?></td>
  </tr>
  <tr>
    <th>Summary</th>
    <td><?php echo $_SESSION['summary'] ?></td>
  </tr>
</table>

<?php include_once("../page_bottom.php"); ?>
</body>

</html>