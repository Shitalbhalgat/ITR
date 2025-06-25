<html>
<head>
<title> Email using PHP</title>
</head>
<body>
<?php
$to="shitalbhalgat@gmail.com";
$subject="Test mail using PHP ";
$message="This is Demo message";
$header="From:shitalbhalgat@gmail.com";
$retvalue=mail($to,$subject,$message,$header);
var_dump( $retvalue);
if($retvalue == true)
{
 Echo "<br> Message sent successfully";
}
else
{
 Echo "Message could not be sent";
}


/*

1)Go to C:\xampp\php and open the php.ini file.

Search and pass the following values:
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = YourGmailId@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"




2)Gto C:\xampp\sendmail and open the sendmail.ini file.

Search and pass the following values

smtp_server=smtp.gmail.com
smtp_port=587 or 25 //use any of them
error_logfile=error.log
debug_logfile=debug.log
auth_username=YourGmailId@gmail.com
auth_password=Your-Gmail-Password/App password
force_sender=YourGmailId@gmail.com(optional)
*/

?>
</body>
</html>