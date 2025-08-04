<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'shopping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($con, $_POST['query']);

    $sql = "SELECT productName, productCompany, productPrice 
            FROM products 
            WHERE productName LIKE '%$search%' 
               OR productCompany LIKE '%$search%' 
            LIMIT 10";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="result-item">';
            echo '<strong>' . htmlentities($row['productName']) . '</strong><br>';
            echo 'Brand: ' . htmlentities($row['productCompany']) . '<br>';
            echo 'Price: $' . htmlentities($row['productPrice']);
            echo '</div>';
        }
    } else {
        echo "<div class='result-item'>No products found.</div>";
    }
}
?>
