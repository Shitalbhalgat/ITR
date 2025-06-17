<!DOCTYPE html>
<html>
<head>
    <title>PHP Validation Example</title>
</head>
<body>

<?php
$name = $email = "";
$nameErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
}

?>

<h2>PHP Form with Validation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red">* <?php echo $nameErr; ?></span>
    <br><br>
    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red">* <?php echo $emailErr; ?></span>
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $nameErr == "" && $emailErr == "") {
    echo "<h3>Your Input:</h3>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
}
?>

</body>
</html>
