<?php
$servername = "mysql:host=localhost;dbname=customer;";
$username = "root";
$password = "";


// Create connection

   $conn =  new PDO($servername, $username, $password);

// Insert Query

	$insert = "INSERT INTO customer(cid, cname)VALUES ('4', 'DEF'),('5','UVW')";

    $conn->query($insert);

// Select SQL QUERY

	$query = "SELECT * FROM customer";


// FETCHING DATA FROM DATABASE

      $result = $conn->query($query);
         
	  // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			echo "Id is" .$row["cid"]. " - Name: " .$row["cname"]. "<br>";
			
		}

//Update Sql Query

$sql = "update customer set cname='rahul' where cid=4";
$conn->query($sql);

//Delete sql query

$sql = "delete from  customer where cid=4";
$conn->query($sql);
  
//Closing a connection 
$conn=null;

?>