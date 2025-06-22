<?php

$a=array(10,20,34,2);
echo"Sorting an Array in Asending order based on their values :";
sort($a);
foreach($a as $val)
{
echo " ".$val;
}

echo "<br>The sort() function does not preserve the original keys of the array elements:".$a[0];//


rsort($a);
echo"<br>Sorting an Array in desending order based on their values :";
foreach($a as $val)
{
echo " ".$val;
}
echo "<br>The rsort() function does not preserve the original keys of the array elements:".$a[0];//

//Associative Array sorting
$b=array("ABC" => "10","XYZ" => "20","PQR" => "30");

echo"<br>Sorting an  Associative array in Asending order using sort():";

sort($b);
foreach($b as $val)
{
    echo " ".$val;
}

echo"<br>The asort() function sort in ascending order based on their values:";

asort($b);
print_r($b);

echo"<br>The arsort() function sort in decending order based on their values:";
arsort($b);
foreach($b as $key=>$val)
{
echo $key." =>".$val."  ";
}

echo"<br>The ksort() function sort in ascending order based on their keys:";
ksort($b);
print_r($b);

echo"<br>The krsort() function sort in decending order based on their keys:";
krsort($b);
print_r($b);


$arr = array("abc1.txt","abc10.txt","abc17.txt","abc22.txt","abc2.txt");
//$arr = array("abc1.txt","Abc10.txt","abc17.txt","abc22.txt","Abc2.txt");

sort($arr);
echo "Standard sorting using Sort():<pre> ";
print_r($arr);
echo "<br>";

natsort($arr);
echo "Natural order using natsort():<pre> ";
print_r($arr);

natcasesort($arr);
echo "Natural order using natcasesort():<pre> ";
print_r($arr);


?>
