<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "customer";

// CREATE CONNECTION BY USING PROCEDURAL

	$conn = mysqli_connect($servername,$username, $password, $databasename);

// GET CONNECTION ERRORS
    if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}

// SQL QUERY

	$query = "SELECT * FROM customer";

// FETCHING DATA FROM DATABASE

    $result = mysqli_query($conn, $query);
    
	  if (mysqli_num_rows($result) > 0)
		{
		   // OUTPUT DATA OF EACH ROW
		     while($row = mysqli_fetch_assoc($result))
      	 	   {
			   echo "Id is: " . $row["cid"]. " - Name is: " . $row["cname"]. "<br>";
	 		   }
		} 
      else
        {
          echo "0 results";
        }

	mysqli_close($conn);



// CREATE CONNECTION BY USING OBJECT ORIENTED 

	$conn = new mysqli($servername,$username, $password, $databasename);

// GET CONNECTION ERRORS

	if ($conn->connect_error)
	 {
			die("Connection failed: " . $conn->connect_error);
	}


// SQL QUERY

	$query = "SELECT * FROM customer";

// FETCHING DATA FROM DATABASE

     $result = $conn->query($query);

	   if ($result->num_rows > 0)
	    {
		   // OUTPUT DATA OF EACH ROW
           while($row = $result->fetch_assoc())
		    {
			  echo "Id is" .$row["cid"]. " - Name: " .$row["cname"]. "<br>";
		    }
        }
	  else 
	   {
			echo "0 results";
	   }   

$conn->close();



?>
