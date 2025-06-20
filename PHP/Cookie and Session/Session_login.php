<?php
$error="";
  session_start();
    if(isset($_POST['s1']))
    {
        $username=$_POST['Uname'];
        $password=$_POST['password'];

        if($username=="Admin" and $password=="Admin123")
        {
            $_SESSION['username']=$username;
            header('location:login.php');
             die();
        }
        else{
            $error ="Enter a correct username and password";
        }
    }

?>
<!DOCTYPE html>
<html>
<head><title>login</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            text-align: center;
        } 
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
             padding: 12px 20px; 
            border: none;
            border-radius: 5px;
           
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 10px;
            display: block;
        } 
    </style></head>
<body>
     <div class="login-container">
    <center>
    <h2>Login page</h2>
    <form action="" method="post">
        Username: <input type="text" name="Uname" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login" name="s1">
        <?php if($error):?>
        <span style="color:red ;"><?php echo $error?></span>
        <?php endif;?>
    </form>
</center></div>
   
</body>
</html>
<?php
 
?>
