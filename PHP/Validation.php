<html>
<form action="" method="POST">

Enter a Name<input type=”text” name="name"><br><br>

Enter mobile no<input type="text" name="mobileno"><br><br>

Enter a email id<input type="text" name="email"><br><br>

<input type="submit" value="Submit">
</form>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
if(empty($_POST['name']))
{
echo "<br>Name can't be blank";
}

if(!is_numeric($_POST['mobileno']))
{
echo "<br>Enter valid Mobile Number";

}


$pattern= '/^([a-zA-Z0-9\._]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';

if(!preg_match($pattern,$_POST['email']))
{
echo "<br>Enter valid Email id";

}
}

/*
if(!filter_var($e,FILTER_VALIDATE_EMAIL))
{
echo "ENTER VALID DATAs";
}*/

//$pattern= '/\b[\w.-]+@[\w.-]+\.[A-Z a-z]{2,6}\b/';?>