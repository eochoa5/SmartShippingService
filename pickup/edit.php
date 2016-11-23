<?php
if(isset($_POST["first"])){
	include("../database/connect.php");
	
	$first=mysqli_real_escape_string($db_conx,$_POST["first"]);
	$last=mysqli_real_escape_string($db_conx,$_POST["last"]);
	$phone=mysqli_real_escape_string($db_conx,$_POST["phone"]);
	$email=mysqli_real_escape_string($db_conx,$_POST["email"]);
	$id=mysqli_real_escape_string($db_conx,$_POST["id"]);
	$date=date('Y-m-d',strtotime($_POST['dt']));
	$time=date(($_POST['tm']));
	if(!empty($time)){
		$sql = "UPDATE pickups SET `first`='$first', `last`='$last', `phone`='$phone', `email`='$email', `date`='$date', `time`='$time' WHERE `id`='$id' ";
		$query = mysqli_query($db_conx, $sql);
		$sql2="SELECT * FROM `pickups` WHERE `id`='$id'";
		$query2=mysqli_query($db_conx, $sql2);
		$found= mysqli_num_rows($query2);
		if($found){
			echo "<script>alert('Changes have been made to pickup #$id.');</script>";
		}else{
			echo "<script>alert('Error. Please try again.');</script>";
		}
	}else{
		$sql = "DELETE FROM `pickups` WHERE `pickups`.`id` = '$id'";
		$query = mysqli_query($db_conx, $sql);
		$sql2="SELECT * FROM `pickups` WHERE `id`='$id'";
		$query2=mysqli_query($db_conx, $sql2);
		$found= mysqli_num_rows($query2);
		if(!$found){
			echo "<script>alert('Pickup #$id has been deleted.');</script>";
		}else{
			echo "<script>alert('Error. Please try again.');</script>";
		}
	}
}
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
		<link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css" />
		<script src="../js/ddmenu.js" type="text/javascript"></script>
		<title> Cancel or change pick up date/time</title>
	</head>
<body>
<?php include_once("../page_top.php"); ?>
<form id="editForm" name="editForm" method="post" action="edit.php">
<div class="abc" style="margin-top:10px">Please fill out the information below</div>
 <div id="signupFormDiv">
	<label><b>Pickup ID to change/cancel</b></label><br>
    <input id="id" type="text" placeholder="ID" name="id" required maxlength="20" size="40"><br/>
    <label><b>First</b></label><br>
    <input id="first" type="text" placeholder="First" name="first" required maxlength="30"><br>
    <label><b>Last</b></label><br>
    <input id="last" type="text" placeholder="Last" name="last" required maxlength="30"><br>
	<label><b>Phone Number</b></label><br>
    <input id="phone" type="text" placeholder="Phone Number" name="phone" required maxlength="15"><br>
	<label><b>Email</b></label><br>
    <input id="email" type="text" placeholder="Email" name="email" required maxlength="50"><br>
	<label><b>New date (leave blank if cancelling)</b></label><br>
	<input type="date" name="dt"><br/>
	<label><b>New time (leave blank if cancelling)</b></label><br>
	<input type="time" name="tm"><br/> 
    <button style="margin-top: 13px" id="editbtn" onclick="">Reschedule</button><br>
	<button style="margin-top: 13px" id="cancelbtn" onclick="">Cancel</button><br>
</div>
  
</form>





<?php include_once("../page_bottom.php"); ?>
</body>

</html>
