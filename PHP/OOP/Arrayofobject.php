<?php

class student
{
public $name="abc";

public $city="xyz";

private $mob=1222;

function f1()
{
echo $this->name."<br>";

echo $this->city."<br>";

echo $this->mob."<br>";

}
}


$obj = new student;

print_r($obj);

echo $obj->name."<br>";

for($i=1;$i<3;$i++)
{
$obj->f1();
}

?>

