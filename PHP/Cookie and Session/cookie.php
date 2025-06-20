<?php
//Create a Cookie

 	$cookie_name = "ABC";

 	$cookie_value = "XYZ";

 	setcookie($cookie_name,$cookie_value,time()+300,"/");

//for accessing a cookie

    print_r($_COOKIE);
	echo "<BR>".$_COOKIE["ABC"]."<BR>";

?>
