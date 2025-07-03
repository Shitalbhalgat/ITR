<?php
 if(isset($_FILES["image"]))
 {
    echo"<pre>";
    print_r($_FILES["image"]);
    echo"</pre>";

    $folder="image/".$_FILES["image"]['name'];
    move_uploaded_file($_FILES["image"]['tmp_name'],$folder);
    echo "<img src='$folder' alt='' height='100px' width='100px'><br><br>";

$con = mysqli_connect('localhost','root','','student');
if (!$con)
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
    echo "Connected sucessfully";
}
$sql="insert into stud_info (image) values('$folder')";
if(mysqli_query($con,$sql))
{
    echo "New record inserted successfully";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
 
?>


<html>
    <body>
        <center>
        <form action="#" enctype="multipart/form-data" method="post">
        <input type="file" name="image" id=""><br><br>
        <input type="submit" value="uploadfile">
        </form>
        </center>
</body>
</html>