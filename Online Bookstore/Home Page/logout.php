<?php 
	#logout from the session and return to home page
    session_start();

    session_destroy();

    header('Location: ../Home Page/Home.php');

?>