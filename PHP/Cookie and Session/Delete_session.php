<?php
// for Destroy Session
  session_start();
		//Delete all session variable
        session_unset();

        // delete session 
       session_destroy();
?>