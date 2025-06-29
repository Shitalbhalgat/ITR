<?php
class class1{
       public $name="abc";
     function __construct()
    {
       
       echo "Inside constructor"."<br>";
    }
    function f1()
    {
        echo "inside function.<br>";
    }

    function __destruct()
        {

          echo "Inside Destructor";

         }

}
$obj=new class1;

$obj->f1();

?>