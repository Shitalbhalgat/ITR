 <?php

$a=array(10,20,30);

echo "Length of array ".count($a);
echo"<br>";

echo "Addition of array element using array_sum():".array_sum($a);
echo"<br>";

echo "Multiplication of array element using array_product():".array_product($a);

echo "<br>";
array_push($a,28,45,45);
echo" Adding an element in array using array_push():<br>";
print_r($a);
echo "<br>";

array_pop($a);
echo"Removing an element in array using array_pop():<br>";
print_r($a);
echo "<br>";

echo"  Count all values of an array using array_count_values():<br>";
print_r(array_count_values($a));
echo "<br>";

$a1=array("23","34","45","56","67");

$c=array_combine($a,$a1);
echo"array_combine():<br>";
print_r($c);
echo "<br>";

echo"array_merge():<br>";
print_r(array_merge($a,$a1));

echo"<br>array_diff():";
print_r(array_diff($a,$a1));

echo"<br>array intersect():";
print_r(array_intersect($a,$a1));

$a2=array(11,22,11,33);

echo"<br>Serach():".array_search(22,$a2);
echo" <br>in_array():".in_array(33,$a2);

echo"<br>array_unique():";
print_r(array_unique($a2));

$b =array("a"=>"10","b"=>"20","c"=>"30");
echo"<br> array_flip():";
print_r(array_flip($b));

echo"<br>array_reverse():";
print_r(array_reverse($b));


echo"<br>array_chunk():";
print_r( array_chunk($a,2));

echo"<br>array_slice():";
print_r(array_slice($a,2,2,true));

echo"<br>array_splice():";
print_r(array_splice($a,1));

?>