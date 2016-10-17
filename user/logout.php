<?php
session_start();
$_SESSION = array();
session_destroy();
if(isset($_COOKIE["name"])) {
	setcookie("name", '', strtotime( '-5 days' ), '/');
   
}
header("location: http://localhost:8080/SmartShippingService");
exit();
 
?>