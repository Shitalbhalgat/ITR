<?php

// For Modify Sessions
session_start();

if (!isset($_SESSION['user']))
{
    echo "Session is not set!<BR>";
}
else
{
     $_SESSION['user']='PQR';
     echo "Session  is set! <br>";
     echo "username  ".$_SESSION['user'];	

}
?>