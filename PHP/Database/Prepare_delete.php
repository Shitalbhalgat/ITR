<?php
$conn = mysqli_connect("localhost", "root", "", "customer");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare DELETE query
$sql = "DELETE FROM customer WHERE cname = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

// Bind parameter
$cname = "UVW";
mysqli_stmt_bind_param($stmt, "s", $cname);

// Execute
if (mysqli_stmt_execute($stmt)) {
    echo "Customer deleted successfully.";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
