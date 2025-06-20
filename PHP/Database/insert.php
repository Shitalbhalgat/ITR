<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";

// Create connection using procedural

	$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

    if (!$conn)
    {
      die("Connection failed: " . mysqli_connect_error());
    }


// Insert Query

	$sql = "INSERT INTO customer(cid, cname)VALUES ('3', 'PQR'  )";

		if (mysqli_query($conn, $sql)) 
	    {
  			echo "New record inserted successfully";
	    }
    else 
      {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }

// close the coonection
mysqli_close($conn);


// By using Object oriented

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

    if ($conn->connect_error) 
      {
         die("Connection failed: " . $conn->connect_error);
      }

    $sql = "INSERT INTO customer(cid, cname)VALUES ('3', 'PQR')";
   
     if ($conn->query($sql) === TRUE) 
       {
         echo "New record created successfully";
       }
     else 
       {
          echo "Error: " . $sql . "<br>" . $conn->error;
       }

 //close the connection       
$conn->close();
?>