function signup(){
	var fn = document.getElementById("first").value.trim();
	var ln = document.getElementById("last").value.trim();
	var em = document.getElementById("email").value.trim();
	var ad = document.getElementById("address").value.trim();
	var cn = document.getElementById("country").value.trim();
	var st = document.getElementById("state").value.trim();
	var zp = document.getElementById("zip").value.trim();
	var pw = document.getElementById("pass").value.trim();
	var pn = document.getElementById("phone").value.trim();
	
	if(fn !="" && ln !="" && em !="" && ad !="" && cn !="" && st !="" && zp !="" && pw !="" && pn !=""){
		
		var req = new XMLHttpRequest();
    req.open("POST", "signup.php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
	    if(req.readyState == 4 && req.status == 200) {
			if(req.responseText !=1){
				alert('There is already an account with that email address');	
			}
			else{
				document.getElementById("signupForm").innerHTML="Account created. Click <a href='http://localhost:8080/ShippingWebsite'>here</a> to log in.";	
			}
	    }
    }
    var adr= ad + ", "+ cn + ", "+ st+ ", "+ zp;
	
    req.send("firstname="+fn+"&lastname="+ln+"&email="+em+"&address="+adr+"&password="+pw+"&phone="+pn); 
    
	
	}
}
	
