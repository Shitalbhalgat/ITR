<?php
$conn = mysqli_connect("localhost", "root", "", "customer");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare UPDATE query
$sql = "UPDATE customer SET cid = ? WHERE cname = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

// Bind parameters
$New_id= "3";
$new_name = "pqr";

mysqli_stmt_bind_param($stmt, "ss",$New_id ,$new_name,);

// Execute
if (mysqli_stmt_execute($stmt)) {
    echo "Customer updated successfully.";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
