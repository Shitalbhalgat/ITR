<?php 



//logical Operator 
$x = 50;
$y = 30;
if ($x == 50 and $y == 30)
	echo "and Success \n";

if ($x == 50 or $y == 20)
	echo "or Success \n";

if ($x == 50 xor $y == 20)
	echo "xor Success \n";

if ($x == 50 && $y == 30)
	echo "&& Success \n";

if ($x == 50 || $y == 20)
	echo "|| Success \n";

if (!$z)
	echo "! Success \n";

//Comparison opertaor
$a = 80;
$b = 50;
$c = "80";
var_dump($a == $c) + "\n";
var_dump($a != $b) + "\n";
var_dump($a <> $b) + "\n";
var_dump($a === $c) + "\n";
var_dump($a !== $c) + "\n";
var_dump($a < $b) + "\n";
var_dump($a > $b) + "\n";
var_dump($a <= $b) + "\n";
var_dump($a >= $b);


//Conditional /ternary operator

$x = -12;
echo ($x > 0) ? 'The number is positive' : 'The number is negative';


//Assignment Operators

// Simple assign operator
$y = 75;
echo $y, "\n";

// Add then assign operator
$y = 100;
$y += 200;
echo $y, "\n";

// Subtract then assign operator
$y = 70;
$y -= 10;
echo $y, "\n";

// Multiply then assign operator
$y = 30;
$y *= 20;
echo $y, "\n";

// Divide then assign(quotient) operator
$y = 100;
$y /= 5;
echo $y, "\n";

// Divide then assign(remainder) operator
$y = 50;
$y %= 5;
echo $y;


//Array Operator
$x = array("k" => "Car", "l" => "Bike");
$y = array("a" => "Train", "b" => "Plane");

var_dump($x + $y);
var_dump($x == $y) + "\n";
var_dump($x != $y) + "\n";
var_dump($x <> $y) + "\n";
var_dump($x === $y) + "\n";
var_dump($x !== $y) + "\n";


//String oprator 
$x = "PHP";
$y = ":HYPERTEXT";
$z = "PREPROCESSOR";
echo $x . $y . $z, "\n";
$x .= $y . $z;
echo $x;
?>

?>




?>
