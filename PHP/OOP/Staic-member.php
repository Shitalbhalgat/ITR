<?php
class class1
{
static $x=1;

 static function  f1()
 {
    
    echo "<br> static Member function ";
 }

}

// Accessing static member
echo class1::$x;

// 1st way to call static method 
class1::f1(); 

// 2nd way to call static method 
$obj= new class1;
$obj->f1();
?>