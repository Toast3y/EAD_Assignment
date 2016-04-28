<?php
	if(isset($_COOKIE["user_logged_in"])){
		#Validate the cookie, see if it's valid.
		
	}
?>



<h1>La Corona Restaurant</h1><br><br>

To make a reservation, please click <a href="Reservations/">here</a>.<br><br>

--------------------<br><br>

<?php

	#Change to if(isValidated)
	if(isset($_COOKIE["user_logged_in"])){
		echo("To view approved reservations, please click <a href=\"Reservations/ApprovedReservations/\">here</a>.<br><br>");
	}
	else{
		echo("To approve reservations, super users should log in <a href=\"UserLogin/\">here</a>.<br><br>");
	}

?>