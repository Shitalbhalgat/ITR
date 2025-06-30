<?php
include ('abc.pdf');
 echo date("d")."<br>";

echo date("jS")."<br>";

echo date("F")."<br>";

echo date("m")."<br>";

echo date("M")."<br>";

echo date("n")."<br>";

echo date("y")."<br>";

echo date("Y")."<br>";

echo date("D")."<br>";

echo date("l")."<br>";

echo date("N")."<br>";

echo date("w")."<br>";

echo date("L")."<br>";

echo date("z")."<br>";

echo date("t")."<br>";

echo date("W")."<br>";



$today=date("y/m/d");
echo $today;
echo"<br>";
echo date("d-F-Y")."<BR>";

//displaying server time 
ECHO date("h:i:sA")."<br>";
ECHO date_default_timezone_get()."<br>";

//time() Returns seconds from 1 jan 1970
$t=time();
echo $t."<br>";

//Displaying a system time
date_default_timezone_set("asia/kolkata")."<br>";
echo(date("F d,Y h:i:s A"));
echo"<br>";

//displaying a future or past date

echo "past date".date('d-m-Y',mktime(0,0,0,6,7,2000));

echo "<br>past date with time".date('d-m-Y h:i:sa',mktime(9,4,56,6,7,2000));


?>