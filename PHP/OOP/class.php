<?php
// Creating class in php
class class1
    {


     }
     
 // creating object of class     
    $obj=new class1;

print_r($obj);


class class2
{
   //Property of Class
      public $X=1;

  // Method of class
     function f1()
       {
          echo $this->X;
          echo " , ".$this->X++."<br>";
       }
}

$obj1=new class2;
    echo "<br>";
    print_r($obj1);
    echo "<br> Printing Value of Property x from outside of class  : ".$obj1->X."<br>";
    ECHO "Calling Class Method from outside class  ";
$obj1->f1();
    echo "value of x of obj1 = ".$obj1->X."<br>";
$obj1->X=5;
    echo " new value of x of obj1 = ".$obj1->X."<br>";

$obj2=new class2();
    echo "value of x of obj2 = ".$obj2->X."<br>";

?>
