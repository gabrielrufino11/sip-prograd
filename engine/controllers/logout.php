<?php session_start();
	require_once "../config.php";

	session_destroy();
	
	echo 'kickme';

?>