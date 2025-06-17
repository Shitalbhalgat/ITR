<?php
//Create an array using array() function
$a=array(1,2,3,4,5);

echo"<h1>1st Array <pre>";

echo $a[0]."<br>";
echo $a[1]."<br>";
echo $a[2]."<br>";
echo $a[3]."<br>";
echo $a[4]."<br>";

 print_r($a);

 // 2nd way of creating an array 
 echo "<hr>2nd array";
 $b[0]="abc";
 $b[1]="pqr";
 $b[2]="xyz";
echo"<br>";
echo"<h4><pre>";
print_r($b);

//3rd way of creating an array

$c=[10,20 ,30 ,40];
echo"<hr>3rd array<br>";
print_r($c);
echo"<br>";

//Updating an array element

echo"<hr>updating array element:";
$b[2]="lmn";

// for traversing Indexed Array 
//1) for loop 2)foreach loop
 $c=count($b);
for($i=0;$i<$c;$i++)
{
echo $b[$i]."<br>";
}

echo "<hr>traversing using foreach: ";
foreach($b as $val)
{
echo $val."<br>";


}

//for deleting elemennt
echo"<hr>Deleting array element<br>";
unset($a[2]);

print_r($a);
?>