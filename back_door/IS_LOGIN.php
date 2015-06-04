<?php
	session_start ();
	$login_flag = $_SESSION ["is_admin_login"];
	
	if (!$login_flag) {
		header ( "Location: login.php" );
	}
?>
