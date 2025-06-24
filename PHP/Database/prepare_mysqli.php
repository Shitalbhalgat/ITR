<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "customer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT cid FROM customer WHERE cname = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

// Bind parameters: "s" = string
$cname = "UVW";
mysqli_stmt_bind_param($stmt, "s", $cname);

// Execute the statement
mysqli_stmt_execute($stmt);

// Bind result variables
mysqli_stmt_bind_result($stmt, $id);

// Fetch and display results
while (mysqli_stmt_fetch($stmt)) {
    echo "ID: $id<br>";
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
