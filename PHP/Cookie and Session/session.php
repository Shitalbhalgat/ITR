<?php
// Seesion start
session_start();

// Set Seesion Variables

	$_SESSION['user']='abc';

	$_SESSION['Password']='1234';


//Get Seesion varaibles

	echo "username ".$_SESSION['user']."<br>";
?>