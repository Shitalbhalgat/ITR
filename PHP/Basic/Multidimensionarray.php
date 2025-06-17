<?php
$Student =  array(
           array ("Name" => "Rahul" ,"Mob_no"=>"9456372245", "Email_Id"=>"Rahul@gmail.com"),
           array ("Name" =>"Ram","Mob_no"=>"9734226545", "Email_Id"=>"Ram@gmail.com"),
          array ("Name" =>"Sham", "Mob_no"=>"9154372245", "Email_Id"=>"Sham@gmail.com"));

$Student[1]["Email_Id"]="Ram123@gmail.com";
echo"<pre>";
print_r($Student);
echo"</pre>";
echo"<br>";

//delete  an Array Element using unset()
//unset($Student[1][1]); // can't delete a element because index is numeric

unset($Student[1]["Email_Id"]);
echo"<pre>";
print_r($Student);
echo"</pre>";
?>
