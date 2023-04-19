<?php
	if ( !isset($_SESSION))
	{
		session_start(); // ici on continue la session
	}
	if ( (!isset($_SESSION['mail'])) || ($_SESSION['mail'] == ''))
	{
		echo "<p>Vous devez vous <a href='/intranet/client.php'>connecter</a>.</p>";
		exit();
	}
?>