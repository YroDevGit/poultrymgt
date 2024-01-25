<?php
include "includes/database.php";
	




    session_start();
    $user = $_SESSION['uid'];
    addHistory($user,0); 
    session_destroy();

    header("location: index.php");

?>