<?php
$conn = mysqli_connect("localhost", "root", "", "customer");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare INSERT query
$sql = "INSERT INTO customer (cid, cname) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

// Bind parameters: both are strings (s, s)
$cid = "2";
$cname = "pqr";
mysqli_stmt_bind_param($stmt, "ss", $cid, $cname);

// Execute
if (mysqli_stmt_execute($stmt)) {
    echo "Customer inserted successfully.";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
