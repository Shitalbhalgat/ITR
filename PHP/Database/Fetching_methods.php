<?php
// CREATE CONNECTION BY USING PROCEDURAL
$conn= Mysqli_connect("localhost","root","","customer");
if(!$conn)
{
    die("Connection Falied".Mysqli_connect_error());
}
else 
{
    echo "Connected Successfully<br>";
}

// SQL QUERY

$query = "SELECT * FROM customer";

// FETCHING DATA FROM DATABASE

    $result = mysqli_query($conn, $query);

    // mysqli_num_rows():return the number of rows in the result set
     echo mysqli_num_rows($result)."<br>";

   // mysqli_fetch_row(): fetches one row of data from the result set and return it as an index array
     print_r( mysqli_fetch_row($result));
     echo "<br>";
  
   // mysqli_fetch_assoc(): fetches one row of data from the result set and return it as an associative array
   print_r( mysqli_fetch_assoc($result));
   echo "<br>";
 
// mysqli_fetch_array(): fetches one row of data from the result set and return it as an associative array,a numeric or both 
    echo "Numeric array:";
    print_r(mysqli_fetch_array($result,MYSQLI_NUM));
    echo "<br>";
    echo "Associative array:";
    print_r( mysqli_fetch_array($result,MYSQLI_ASSOC));
    echo "<br>";

  // mysqli_fetch_object(): fetches one row of data from the result set and return it as an associative array
    print_r( mysqli_fetch_object($result));
    echo "<br>";

//close the connection
mysqli_close($conn);
?>