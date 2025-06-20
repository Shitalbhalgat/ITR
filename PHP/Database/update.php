<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";


// Create connection

   $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

		if (!$conn) 
		{
  			die("Connection failed: " . mysqli_connect_error());
		}	

// Update Query

	$sql = "update customer set cname='rahul' where cid=1";

		if (mysqli_query($conn, $sql)) 
		{
  		 echo "Record Updated successfully<br>";
		}
	 else 
		{
  			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

// SQL QUERY

	$query = "SELECT * FROM customer where cid=1";

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



//By using objcet oriented

  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

    if ($conn->connect_error) 
    {
     die("Connection failed: " . $conn->connect_error);
    }

// Update Query

$sql = "update customer set cname='rahul' where cid=3";

 
 if ($conn->query($sql) === TRUE)
  {
    echo " Record Updated successfully<br>";
   }
 else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
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
	else {
			echo "0 results";
		}

$conn->close();


?>