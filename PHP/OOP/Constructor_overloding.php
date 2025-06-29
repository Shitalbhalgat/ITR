<?php

class class1
{
	public $x,$y;
    function __construct($a)
    {
        $this->x=$a;
        echo $this->x;


    }
    function __construct($a,$b)
    {
        $this->x=$a;
        $this->y=$b;

        echo $this->x ." " .$this->y;


    }

function __call($fn,$args)
{
	if($fn=='__construct')
		{
		$cn=count($args);
			switch($cn)
			{
				case 1: 
  					   $this->x=10;
					   echo  $args[0];
                       break;
				case 2:
   					 $this->x=20;
					$this->y=30;
					echo  $args[0]."  ".$args[1];

					break;
			}
		}
}

}

$obj =new class1(10);
$obj =new class1(10,20);
?>