<?php
session_start();
if(!isset($_SESSION['username']))
{
     header('location:Session_login.php');
    die();
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background:  #f0f2f5;;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #00796b;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #00796b;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
     <div class="container">
        <h1>Welcome to <?php echo $_SESSION['username']; ?>'s Page</h1>
        <a href="destroy.php">Logout</a>
    </div>
</body>
</html>