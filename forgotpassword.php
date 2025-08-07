<?php
require("db_connection.php");

$passworderror="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
        $a = $_POST["enrollment"];
        $sql="SELECT *FROM student_information WHERE EnrollmentNo = '$a'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
                {
        
                $to=$row['Email_id'];
                $subject="Password";
                $message="Your password is :".$row['Password'];
                $header="From:abc@gmail.com";
                $retvalue=mail($to,$subject,$message,$header);
              
                if($retvalue == true)
                {
                    $passworderror=" password  sent on registered email";
                }
                else
                {
                 $passworderror= "Message could not be sent";
                }
              }} 
         else 
            {
                $passworderror= "Enter Correct Enrollment Number";
            }
        
    mysqli_close($conn);


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - GOVERNMENT POLYTECHNIC, AHILYANAGAR</title>
    <link rel="stylesheet" href="css/Student-login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqVWNZWi7nxEhsGh66uIQO-Vd289U4VDhmIg&s" alt="College Logo">
            </div>
            <h1>Government Polytechnic, Ahilyanagar</h1>
            <h2>Student Section</h2>
            <p>Welcome to the student portal</p>
        </div>
        
        <div class="right-side">
            <div class="login-box">
                <h2>Student Login</h2>
                <form action="#" method="POST">
                    <div class="input-group">
                        <label>Enrollment No.</label>
                        <input type="text" name="enrollment" placeholder="Enter your enrollment number" required>
                    </div>
                <button type="submit">Send</button>
                    <?php if($passworderror):?>
                      <span style="color:red ;"><?php echo $passworderror?></span>
                     <?php endif;?>
                    

                </form>
            </div>
        </div>
    </div>
</body>
</html>