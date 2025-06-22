<?php

//numberformat
$sum="2010000.345";
echo number_format($sum,2,"*" ,"#");
echo"<br>";
echo(int)$sum;

//width specifier,padding specifier, sign precision
$a=65;
echo"<br>";
printf("%o",$a);
echo"<br>";
printf("%.1f",65.112);
echo"<br><pre>";
printf("%10s","hi");
echo"</pre><br>";
printf("%.2s","nbjh");
echo"<br>";
printf("%'*-10s",$a);


// string function
$str="hello how are you hello i am fine";

print("<br>length of the string is ".strlen($str));
echo"<br>";

echo("No of words in string : ".str_word_count($str));
echo"<br>";

$a=strrev($str);
echo "Reverse the string : ".$a;
echo"<br>";

echo("strpos():".strpos($str,"are"));
echo"<br>";

echo("str_replace():".str_Replace("you","php",$str));
echo"<br>";

echo("Ucwords() :".Ucwords($str));
echo"<br>";

echo("lcfirst(): ".lcfirst($str));
echo"<br>";

echo("usfirst(): ".ucfirst($str));
echo"<br>";

echo("strtoupper():".strtoupper($str));
echo"<br>";

echo("strtolower(): ".strtolower($str)); 
 echo"<br>";

 echo("str_repeat():".str_repeat($str,2)); 
 echo"<br>";

echo("strcmp():".strcmp($str,"hello how are you hello i am fine")); 
echo"<br>";

echo "strcmp():".strcmp("Zllo","BC");
echo"<br>";

echo("strcmp():".strcmp("H","A"));
echo"<br>";

echo("substr()".Substr($str,0,7));
echo"<br>";

echo("trim():".trim($str,"hello"));
echo"<br>";

$str1="hello php";
echo("trim():".trim($str1,"hpe"));
echo"<br>";

echo("rtrim():".rtrim($str1,"ph"));
echo"<br>";

echo("ltrim():".ltrim($str1,"hpe"));
echo"<br>";


echo("str_shuffle():".str_shuffle($str1));
echo"<br>";

echo"str_spilt():";
$array=str_split($str1,2);
print_r($array);
echo"<br>";

$new=chunk_split($str1,3,">>>");
echo "chunk_split() :s".$new;
echo"<br>";

echo"strstr():".(strstr("php PERSONAL HOME PAGE","HOME"));
echo"<br>";
?>