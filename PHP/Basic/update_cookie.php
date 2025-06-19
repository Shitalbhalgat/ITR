<?php
    //for Modify cookie

	if (!isset($_COOKIE["ABC"]))
 	{
 		echo "Cookie named '" . "' is not 	set!<BR>";
 	}
 	else
 	{
		setcookie("ABC","PQR",time()+300,"/");
 		echo "Cookie '" . "' is set! <br>";
 		echo "Value is: " . $_COOKIE["ABC"];
	
	 }

	 ?>