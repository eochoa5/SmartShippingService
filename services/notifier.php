<?php

	/* 
	
	
	include_once("../database/connect.php");
	$sql = "SELECT shipments.email, shipments.summary FROM shipments
	JOIN notifications ON shipments.shipmentID=notifications.shipmentID WHERE shipments.delivered='YES' AND notifications.notified='NO'";
	$query = mysqli_query($db_conx, $sql); 
	
	while($row = mysqli_fetch_array($query)){
		$to = $row['email'];							 
		$from = "notifier@SmartShippingService.com";
		$subject = 'Your shipment has arrived at destination';
		$message = '<!DOCTYPE html>
		<html><head><meta charset="UTF-8"><title>Shipment arrival notification</title></head>
		<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
		<div style="padding:10px; background:#333; font-size:24px; color:#CCC;">
		Your shipment has arrived. <br/><br/>
		Shipment info: $row['summary']
		</div>
		</body>
		</html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo mail($to, $subject, $message, $headers);
		
   
	}
	*/
		
	

?>