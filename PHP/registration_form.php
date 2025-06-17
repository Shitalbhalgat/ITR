<html>
<body>
<form action=" " method="GET">
<lable>enter name</lable> <input type=”text” name="user"><br><br>
enter a password <input type="password" name ="t"><br><br>
enter mobile no <input type="number" name ="t1"><br><br>
enter a email id <input type="email" name="t2"><br><br>

enter a address <textarea name="t3"  value ="area"rows=3 cloumn=20></textarea><br>
select your gender:
<br> <input type="radio" name="t4" value="male">male<br>
<input type="radio" name="t4" value="female">female

<br><br>

<input type="submit" value="Submit" name= "submit"/>
</form>

<?php
if(isset($_GET['submit'])){
echo $_GET['user']."<br>";
echo $_GET['t']."<br>";
echo $_GET['t1']."<br>";
echo $_GET['t2']."<br>";
echo $_GET['t3']."<br>";
echo $_GET['t4']."<br>";
}
?>