<?php
	include "database.php";
	session_start();
	
	unset ($_SESSION["admin_ID"]);
	unset ($_SESSION["admin_name"]);
	unset ($_SESSION["prof_ID"]);
	unset ($_SESSION["prof_name"]);
	unset ($_SESSION["student_ID"]);
	unset ($_SESSION["student_name"]);
	
	session_destroy();
	echo "<script>window.open('index.php','_self');</script>";
?>