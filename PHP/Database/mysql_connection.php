<?php
// CREATE CONNECTION BY USING PROCEDURAL
$conn= Mysqli_connect("localhost","root","","customer");
if(!$conn)
{
    die("Connection Falied".Mysqli_connect_error());
}
else 
{
    echo "Connected Successfully";
}

//close the connection
mysqli_close($conn);




//CREATE CONNECTION BY USING OBJECT ORIENTED 

$conn= new mysqli("localhost","root","","customer");
if($conn->connect_error) 
{
    die($conn->connect_error);
}
else 
{
    echo " <br>Connected Successfully";
}
//close the connection
$conn->close();

?>