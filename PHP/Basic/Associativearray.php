  <?php
//1st way to create Associative Array 
$emp["name"]="rahul";
$emp["Mob_no"]=1233455677;
echo "1st array";
echo " ".$emp["name"]."<br>";
echo " ".$emp["Mob_no"]."<br>";

//2nd way to create Associative Array 

$emp=array ("Name" => "Rahul" ,"Mob_no"=>9456372245, "Email_Id"=>"Rahul@gmail.com");
echo "<hr>2nd array";
echo"<pre>";
print_r($emp);
echo"</pre>";

//Modify the value of Array Element
echo"<hr>updating array element:";

$emp["Mob_no"]=9456732222;

//For Traversing a array
foreach($emp as $key=>$val)
{
  echo $key ."=>".$val;
  echo "<br>";
}

//for deleting a element
echo"<hr>Deleting array element<br>";

unset($emp["Name"]);

// using Print_() function
echo"<pre>";
print_r($emp);
echo"</pre>";?>
