<?php
$servername = "mysql:host=localhost;dbname=customer";
$username = "root";
$password = "";


// Create connection

     
	$conn =  new PDO($servername, $username, $password);

$name="DEF";

//Prepared Statment

$query = "SELECT * FROM customer where cname = ?";


// FETCHING DATA FROM DATABASE




$result = $conn->prepare($query);

//$result->bindparam(1,$name,PDO::PARAM_STR);

$result->execute();

// OUTPUT DATA OF EACH ROW

		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			echo "Id is" .$row["cid"]. " - Name: " .$row["cname"]. "<br>";
			
		}

$conn=null;
?>